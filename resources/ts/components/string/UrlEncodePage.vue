<template>
    <div>
        <el-form :model="form" label-width="auto" ref="formRef" :rules="rules">
            <el-form-item label="Enter text" label-position="top" prop="text">
                <el-input
                    v-model="form.text"
                    type="textarea"
                    placeholder="Type your text..."
                />
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(formRef)"
                    >Submit</el-button
                >
                <el-button @click="resetForm(formRef)">Reset</el-button>
            </el-form-item>
        </el-form>
        <el-divider />
        <div class="caption">Result:</div>
        <div class="p-input mb-6">{{ result }}</div>
        <AppCopyBtn :text="result" />
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";

import AppCopyBtn from "../common/AppCopyBtn.vue";

import type { FormInstance, FormRules } from "element-plus";

interface RuleForm {
    text: string;
}

const formRef = ref<FormInstance>();

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
</script>
