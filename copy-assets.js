import fs from "fs-extra";
import path from "path";

const sourceDir = path.resolve("vendor/tinymce/tinymce");
const destDir = path.resolve("public/js/tinymce");

if (fs.existsSync(sourceDir)) {
    fs.copySync(sourceDir, destDir);
    console.log("TinyMCE assets copied successfully.");
} else {
    console.error("Source directory for TinyMCE does not exist.");
}
