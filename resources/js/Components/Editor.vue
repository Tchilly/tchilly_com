<script>
import { h, onMounted, ref } from "vue";
import Editor from "@toast-ui/editor";
//import "codemirror/lib/codemirror.css";
import "@toast-ui/editor/dist/toastui-editor.css";
//import "highlight.js/styles/github.css";

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
                previewStyle: "tab",
                //plugins: [[codeSyntaxHighlight, { hljs }]],
                events: {
                    change: () => emit("update:modelValue", e.getMarkdown()),
                },
            });
        });

        return () =>
            h("div", {
                ref: editor,
            });
    },
};
</script>
