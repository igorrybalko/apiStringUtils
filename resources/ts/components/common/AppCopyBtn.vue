<template>
    <el-button type="primary" @click="copyText" :icon="CopyDocument">
        {{ name }}
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
    name: {
        type: String,
        default: "Copy",
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
