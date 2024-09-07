import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { resolve } from "path";
import fs from "fs-extra";

// Define the Vite configuration
export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            plugins: [
                {
                    name: "copy-assets",
                    writeBundle() {
                        const sourceDir = resolve(
                            __dirname,
                            "vendor/tinymce/tinymce"
                        );
                        const destDir = resolve(__dirname, "public/js/tinymce");

                        if (fs.existsSync(sourceDir)) {
                            fs.copySync(sourceDir, destDir);
                        } else {
                            console.error(
                                "Source directory for TinyMCE does not exist."
                            );
                        }
                    },
                },
            ],
        },
    },
});
