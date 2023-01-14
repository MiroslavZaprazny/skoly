import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  server: {
    port: 8000,
    watch: {
      usePolling: true,
    },
    proxy: {
      "/api": {
        target: "http://php:9000",
        changeOrigin: true,
        secure: false,
        ws: true,
      },
    },
  },
});
