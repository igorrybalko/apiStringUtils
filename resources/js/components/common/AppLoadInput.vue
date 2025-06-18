<template>
    <div class="lg:w-1/2">
        <el-form-item label="Load URL" label-position="top">
            <el-input v-model="url" :placeholder="placeholder">
                <template #append>
                    <el-button
                        type="primary"
                        @click="loadUrl"
                        :loading="loading"
                        >Load</el-button
                    >
                </template>
            </el-input>
        </el-form-item>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { ElNotification } from "element-plus";

import { useCommonStore } from "../../stores/common";

const commonStore = useCommonStore();

defineProps({
    placeholder: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(["updateData"]);

const loading = ref(false);
const url = ref("");

function loadUrl() {
    const trimUrl = url.value.trim();
    if (trimUrl) {
        if (trimUrl.startsWith("https://")) {
            loading.value = true;

            commonStore
                .getStingByUrl(url.value)
                .then(({ content }) => {
                    emit("updateData", content);
                })
                .finally(() => {
                    setTimeout(() => {
                        loading.value = false;
                    }, 500);
                });
        } else {
            ElNotification({
                title: "Error",
                message: 'URL should start with "https://"',
                type: "error",
            });
        }
    }
}

function reset() {
    url.value = "";
}

defineExpose({
    reset,
});
</script>
