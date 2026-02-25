import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "src/Resources/assets/css/nexora.css",
        "src/Resources/assets/js/nexora-builder.js",
      ],
      publicDirectory: "../../public",
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
  resolve: {
    alias: {
      vue: "vue/dist/vue.esm-bundler.js",
    },
  },
  build: {
    outDir: "src/Resources/assets/dist",
    emptyOutDir: true,
    rollupOptions: {
      output: {
        entryFileNames: `js/[name].js`,
        chunkFileNames: `js/[name].js`,
        assetFileNames: `[ext]/nexora.[ext]`,
      },
    },
  },
});
