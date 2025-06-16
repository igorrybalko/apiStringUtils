<template>
    <div>
        <div class="text-center mb-6 p-input">{{ uuid }}</div>
        <div class="mb-6">
            <AppCopyBtn :text="uuid" name="Copy UUID" />
        </div>
        <el-button type="primary" @click="generateUuid">
            Generate new UUID
        </el-button>
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

import AppCopyBtn from "../common/AppCopyBtn.vue";

const uuid = ref("");

function generateUuid() {
    uuid.value = crypto.randomUUID();
}

onMounted(() => {
    generateUuid();
});
</script>
