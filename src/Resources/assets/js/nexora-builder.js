import { createApp } from "vue";
import PageBuilder from "./components/PageBuilder.vue";

const appElement = document.querySelector("page-builder");

if (appElement) {
  const app = createApp({});
  app.component("page-builder", PageBuilder);
  app.mount(appElement);
}
