<template>
    <div>
        <el-form :model="form" label-width="auto" ref="formRef" :rules="rules">
            <el-form-item
                label="Enter your JSON"
                label-position="top"
                prop="text"
            >
                <el-input
                    v-model="form.text"
                    type="textarea"
                    placeholder="Type your text..."
                />
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(formRef)"
                    >Compress</el-button
                >
                <el-button @click="resetForm(formRef)">Reset</el-button>
            </el-form-item>
        </el-form>

        <AppLoadInput placeholder="https://example.com/file.json" ref="loadInputRef" @update-data="updateData" />
        
        <el-divider />
        <div class="caption">Result:</div>
        <div class="p-textarea mb-6">{{ result }}</div>
        <AppCopyBtn :text="result" />
        <AppDowloadBtn v-if="result" name="file.json" :content="result" />
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
import { ElNotification } from "element-plus";

import AppCopyBtn from "../common/AppCopyBtn.vue";
import AppDowloadBtn from "../common/AppDowloadBtn.vue";
import AppLoadInput from "../common/AppLoadInput.vue";

import type { FormInstance, FormRules } from "element-plus";

interface RuleForm {
    text: string;
}

const loadInputRef = ref<InstanceType<typeof AppLoadInput>>();

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

function updateData(val: string){
    form.text = val;
}

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.validate((valid) => {
        if (valid) {
            try {
                result.value = JSON.stringify(JSON.parse(form.text));
            } catch (err) {
                ElNotification({
                    title: "Error",
                    message: "JSON data is invalid",
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
    loadInputRef.value?.reset();
};
</script>
