import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import tailwindcss from "@tailwindcss/vite";
import AutoImport from "unplugin-auto-import/vite";
import Components from "unplugin-vue-components/vite";
import { ElementPlusResolver } from "unplugin-vue-components/resolvers";

export default defineConfig({
    // server: {
    //     host: "127.0.0.1", // или 'localhost', или реальный IP
    //     port: 5173,
    //     origin: "http://127.0.0.1:5173", // указывает источник для HMR
    //     strictPort: true,
    // },
    plugins: [
        tailwindcss(),
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/css/style.css",
                "resources/js/app.js",
            ],
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
        AutoImport({
            resolvers: [ElementPlusResolver()],
        }),
        Components({
            resolvers: [ElementPlusResolver()],
        }),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
    css: {
        preprocessorOptions: {
            scss: { api: "modern-compiler" },
        },
    },
});
