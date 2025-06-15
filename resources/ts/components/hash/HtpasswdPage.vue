<template>
    <div>
        <el-form :model="form" label-width="auto" ref="formRef" :rules="rules">
            <el-form-item label="Username" label-position="top" prop="username">
                <el-input
                    v-model="form.username"
                    type="text"
                    placeholder="Type your username..."
                />
            </el-form-item>
            <el-form-item label="Password" label-position="top" prop="password">
                <el-input
                    v-model="form.password"
                    type="password"
                    placeholder="Type your password..."
                    show-password
                />
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(formRef)"
                    >Generate</el-button
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

import { useCommonStore } from "../../stores/common";
import AppCopyBtn from "../common/AppCopyBtn.vue";

import type { FormInstance, FormRules } from "element-plus";

interface RuleForm {
    username: string;
    password: string;
}

const commonStore = useCommonStore();

const formRef = ref<FormInstance>();

const form = reactive({
    username: "",
    password: "",
});

const requiredRule = {
    required: true,
    message: "The field is required",
    trigger: "blur",
};

const rules = reactive<FormRules<RuleForm>>({
    username: requiredRule,
    password: requiredRule,
});

const result = ref("");

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    result.value = "";
};

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.validate((valid) => {
        if (valid) {
            commonStore.getHtpasswd(form.password).then(({ htpasswd }) => {
                result.value = form.username.trim() + ":" + htpasswd;
            });
        }
    });
};
</script>
