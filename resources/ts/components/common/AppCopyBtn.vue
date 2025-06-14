<template>
    <el-button type="primary" @click="copyText" :icon="CopyDocument">
        Copy
    </el-button>
</template>

<script setup lang="ts">
import { CopyDocument } from "@element-plus/icons-vue";
import copy from "copy-to-clipboard";
import { ElNotification } from "element-plus";

const props = defineProps({
    text: {
        type: String,
        required: true,
    },
});

function copyText() {
    if (props.text.length) {
        copy(props.text);

        ElNotification({
            title: "Copied",
            type: "success",
        });
    }
}
</script>
