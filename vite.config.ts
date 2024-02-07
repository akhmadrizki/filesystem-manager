import { defineConfig, splitVendorChunkPlugin } from "vite";
import laravel, { callArtisan, findPhpPath } from "vite-plugin-laravel";
import vue from "@vitejs/plugin-vue";
import inertia from "./resources/scripts/vite/inertia-layout";

export default defineConfig({
  plugins: [
    inertia(),
    vue(),
    laravel({
      watch: [
        {
          condition: (file) => file.includes("routes/"),
          handle: () => {
            // generate route
            callArtisan(
              findPhpPath(),
              "ziggy:generate",
              "resources/scripts/utils/ziggy/index.ts",
            );

            // generate types
            callArtisan(
              findPhpPath(),
              "ziggy:type",
              "resources/scripts/types/ziggy.d.ts",
            );
          },
        },
      ],
    }),
    splitVendorChunkPlugin(),
  ],
});
