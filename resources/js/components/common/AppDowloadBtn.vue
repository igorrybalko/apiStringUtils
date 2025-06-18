<template>
    <el-button
        type="primary"
        tag="a"
        :href="url"
        :icon="Download"
        :download="name"
    >
        Download
    </el-button>
</template>

<script setup lang="ts">
import { Download } from "@element-plus/icons-vue";
import { computed } from "vue";

const props = defineProps({
    content: {
        type: String,
        requred: true,
    },
    name: {
        type: String,
        requred: true,
    },
});

const url = computed(() => {
    if (props.content && props.name) {
        const rawFile = new File([props.content], props.name, {
            type: "text/plain",
        });
        return URL.createObjectURL(rawFile);
    }
    return "";
});
</script>
