<template>
    <div>
        <el-form
            :model="form"
            label-width="auto"
            ref="ruleFormRef"
            :rules="rules"
        >
            <el-form-item label="Enter text" label-position="top" prop="text">
                <el-input
                    v-model="form.text"
                    type="textarea"
                    placeholder="Type your text..."
                />
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(ruleFormRef)"
                    >Submit</el-button
                >
                <el-button @click="resetForm(ruleFormRef)">Reset</el-button>
            </el-form-item>
        </el-form>
        <el-divider />
        <div class="caption">Result:</div>
        <div class="p-input mb-6">{{ result }}</div>
        <el-button type="primary" @click="copyText" :icon="CopyDocument">
            Copy
        </el-button>
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
import copy from "copy-to-clipboard";
import { ElNotification } from "element-plus";
import { CopyDocument } from "@element-plus/icons-vue";

import type { FormInstance, FormRules } from "element-plus";

interface RuleForm {
    text: string;
}

const ruleFormRef = ref<FormInstance>();

const form = reactive({
    text: "",
});

const rules = reactive<FormRules<RuleForm>>({
    text: {
        required: true,
        message: "Please enter data",
        trigger: "blur",
    },
});

const result = ref("");

const submitForm = async (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    await formEl.validate((valid) => {
        if (valid) {
            result.value = encodeURIComponent(form.text);
        }
    });
};

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    result.value = "";
};

function copyText() {
    if (result.value.length) {
        copy(result.value);

        ElNotification({
            title: "Copied",
            type: "success",
        });
    }
}
</script>
