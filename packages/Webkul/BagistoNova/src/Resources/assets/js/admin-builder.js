import { createApp } from "vue";
import PageBuilder from "./components/PageBuilder.vue";

const app = createApp({});

app.component("page-builder", PageBuilder);

app.mount("#app");
