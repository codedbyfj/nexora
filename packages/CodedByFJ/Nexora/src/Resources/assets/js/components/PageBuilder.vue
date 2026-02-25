<template>
  <div class="nexora-builder-wrapper">
    <div
      class="builder-header flex justify-between items-center p-4 bg-white border-b"
    >
      <h1 class="text-xl font-bold">Nexora Page Builder: {{ pageSlug }}</h1>
      <button @click="saveLayout" class="btn btn-primary" :disabled="saving">
        {{ saving ? "Saving..." : "Save Layout" }}
      </button>
    </div>

    <div class="builder-container flex h-[calc(100vh-140px)]">
      <div class="sidebar w-64 bg-gray-50 border-r overflow-y-auto p-4">
        <h2 class="text-sm font-semibold uppercase text-gray-500 mb-4">
          Add Section
        </h2>
        <div
          v-for="(schema, type) in schemas"
          :key="type"
          @click="addSection(type)"
          class="mb-2 p-3 bg-white border rounded cursor-pointer hover:border-blue-500 transition-colors"
        >
          {{ formatType(type) }}
        </div>
      </div>

      <div class="canvas flex-1 bg-gray-100 p-8 overflow-y-auto">
        <draggable v-model="sections" item-key="id" handle=".handle">
          <template #item="{ element, index }">
            <div class="section-item mb-4 bg-white border rounded shadow-sm">
              <div
                class="section-header p-3 border-b flex justify-between items-center bg-gray-50"
              >
                <span class="handle cursor-move font-medium"
                  >⠿ {{ formatType(element.type) }}</span
                >
                <div class="actions">
                  <button
                    @click="editSection(index)"
                    class="text-blue-600 mr-2"
                  >
                    Edit
                  </button>
                  <button @click="removeSection(index)" class="text-red-600">
                    Remove
                  </button>
                </div>
              </div>
              <div
                v-if="editingIndex === index"
                class="section-form p-4 bg-blue-50"
              >
                <div
                  v-for="(field, key) in schemas[element.type].schema"
                  :key="key"
                  class="mb-3"
                >
                  <label class="block text-sm font-medium mb-1">{{
                    field.label
                  }}</label>
                  <input
                    v-if="field.type === 'text'"
                    v-model="element.data[key]"
                    class="control w-full"
                  />
                  <textarea
                    v-if="field.type === 'textarea'"
                    v-model="element.data[key]"
                    class="control w-full"
                  ></textarea>
                  <input
                    v-if="field.type === 'number'"
                    type="number"
                    v-model="element.data[key]"
                    class="control w-full"
                  />
                  <div v-if="field.type === 'image'" class="flex gap-2">
                    <input
                      v-model="element.data[key]"
                      class="control flex-1"
                      placeholder="Image URL"
                    />
                  </div>
                </div>
                <button
                  @click="editingIndex = null"
                  class="btn btn-sm btn-secondary mt-2"
                >
                  Close Editor
                </button>
              </div>
            </div>
          </template>
        </draggable>
      </div>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";

export default {
  components: { draggable },
  props: ["pageSlug", "layoutData", "schemaUrl", "saveUrl"],
  data() {
    return {
      sections: JSON.parse(this.layoutData) || [],
      schemas: {},
      saving: false,
      editingIndex: null,
    };
  },
  mounted() {
    this.fetchSchemas();
  },
  methods: {
    async fetchSchemas() {
      const response = await fetch(this.schemaUrl);
      this.schemas = await response.json();
    },
    addSection(type) {
      const schema = this.schemas[type].schema;
      const defaultData = {};
      Object.keys(schema).forEach((key) => {
        defaultData[key] = schema[key].default || "";
      });
      this.sections.push({
        id: Date.now(),
        type: type,
        data: defaultData,
      });
    },
    editSection(index) {
      this.editingIndex = index;
    },
    removeSection(index) {
      if (confirm("Are you sure?")) {
        this.sections.splice(index, 1);
      }
    },
    async saveLayout() {
      this.saving = true;
      try {
        const response = await fetch(this.saveUrl, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
              .content,
          },
          body: JSON.stringify({
            page_slug: this.pageSlug,
            layout_json: this.sections,
          }),
        });
        const result = await response.json();
        alert(result.message);
      } catch (e) {
        alert("Save failed!");
      } finally {
        this.saving = false;
      }
    },
    formatType(type) {
      return type
        .split("-")
        .map((s) => s.charAt(0).toUpperCase() + s.slice(1))
        .join(" ");
    },
  },
};
</script>

<style scoped>
.nexora-builder-wrapper {
  font-family: "Inter", sans-serif;
}
.control {
  border: 1px solid #d1d5db;
  border-radius: 0.375rem;
  padding: 0.5rem;
}
</style>
