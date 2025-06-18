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
                <el-radio-group v-model="form.option">
                    <el-radio value="lc">lowercase</el-radio>
                    <el-radio value="uc">UPPERCASE</el-radio>
                    <el-radio value="cc">Capitalized Case</el-radio>
                    <el-radio value="sc">Sentence case</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(formRef)"
                    >Convert</el-button
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
import { ElNotification } from "element-plus";

import AppCopyBtn from "../common/AppCopyBtn.vue";

import type { FormInstance, FormRules } from "element-plus";

type ConvertOption = "lc" | "uc" | "cc" | "sc";

interface RuleForm {
    text: string;
    option: ConvertOption;
}

const formRef = ref<FormInstance>();

const form = reactive({
    text: "",
    option: "lc",
});

const rules = reactive<FormRules<RuleForm>>({
    text: {
        required: true,
        message: "Please enter data",
        trigger: "blur",
    },
});

const result = ref("");

function convertToSentence(str: string) {
    return str
        .toLowerCase()
        .replace(/(^\s*\w|[\.\!\?]\s*\w)/g, (s) => s.toUpperCase());
}

function convertToTitleCase(str: string) {
    return str.toLowerCase().replace(/\b\w/g, (s) => s.toUpperCase());
}

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.validate((valid) => {
        if (valid) {
            const actions = {
                lc: () => form.text.toLowerCase(),
                uc: () => form.text.toUpperCase(),
                cc: () => convertToTitleCase(form.text),
                sc: () => convertToSentence(form.text),
            };

            try {
                result.value = actions[form.option]();
            } catch (err) {
                ElNotification({
                    title: "Error",
                    message: "invalid text",
                    type: "error",
                });
            }
        }
    });
};

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    result.value = "";
};
</script>
