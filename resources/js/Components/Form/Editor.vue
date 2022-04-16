<script>
import { h, onMounted, ref } from "vue";
import Editor from "@toast-ui/editor";
import codeSyntaxHighlight from "@toast-ui/editor-plugin-code-syntax-highlight";

import "@toast-ui/editor/dist/toastui-editor.css";
import "prismjs/themes/prism.css";
import "@toast-ui/editor-plugin-code-syntax-highlight/dist/toastui-editor-plugin-code-syntax-highlight.css";

import Prism from "prismjs";
import "prismjs/components/prism-clike.js";
import "prismjs/components/prism-markup-templating.js";
import "prismjs/components/prism-markup.js";
import "prismjs/components/prism-php.js";
import "prismjs/components/prism-css.js";
import "prismjs/components/prism-scss.js";
import "prismjs/components/prism-json.js";
import "prismjs/components/prism-bash.js";
import "prismjs/components/prism-javascript.js";

export default {
    props: {
        modelValue: {
            type: String,
            required: false,
            default: "",
        },
    },
    setup(props, { emit }) {
        const editor = ref();

        onMounted(() => {
            const e = new Editor({
                el: editor.value,
                height: "500px",
                initialEditType: "markdown",
                initialValue: props.modelValue,
                hideModeSwitch: true,
                usageStatistics: false,
                placeholder: "Enter text here, be happy, and start typing...",
                theme: "dark",
                previewStyle: "tab",
                plugins: [[codeSyntaxHighlight, { highlighter: Prism }]],
                events: {
                    change: () => emit("update:modelValue", e.getMarkdown()),
                },
                viewer: true,
            });
        });

        return () =>
            h("div", {
                ref: editor,
            });
    },
};
</script>
