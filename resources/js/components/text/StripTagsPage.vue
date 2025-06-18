<template>
    <div>
        <el-form :model="form" label-width="auto" ref="formRef" :rules="rules">
            <el-form-item label="Enter text" label-position="top" prop="text">
                <el-input
                    v-model="form.text"
                    type="textarea"
                    placeholder="Type your text.."
                />
            </el-form-item>
            <el-form-item prop="trim">
                <el-checkbox v-model="form.trim" @change="changeTrimValue"
                    >Clear line breaks and spaces</el-checkbox
                >
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(formRef)"
                    >Strip tags</el-button
                >
                <el-button @click="resetForm(formRef)">Reset</el-button>
            </el-form-item>
        </el-form>
        <el-divider />
        <div class="caption">Result:</div>
        <div class="p-textarea mb-6" v-if="form.trim">{{ result }}</div>
        <div v-else class="mb-6">
            <el-input :value="result" type="textarea" />
        </div>
        <AppCopyBtn :text="txtDownload" />
        <AppDowloadBtn
            v-if="txtDownload"
            name="stripped-tags.txt"
            :content="txtDownload"
        />
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
import { ElNotification } from "element-plus";

import AppCopyBtn from "../common/AppCopyBtn.vue";
import AppDowloadBtn from "../common/AppDowloadBtn.vue";

import type { FormInstance, FormRules } from "element-plus";

interface RuleForm {
    text: string;
    trim: boolean;
}

const formRef = ref<FormInstance>();

const form = reactive<RuleForm>({
    text: "",
    trim: true,
});

const rules = reactive<FormRules<RuleForm>>({
    text: {
        required: true,
        message: "Please enter data",
        trigger: "blur",
    },
});

const result = ref("");
const txtDownload = ref("");

function setTxtForFile(txt: string, checked: boolean) {
    let copiedTxt = txt;
    if (checked) {
        copiedTxt = txt.replace(/\s+/g, " ");
    }
    txtDownload.value = copiedTxt;
}

function changeTrimValue() {
    setTxtForFile(result.value, form.trim);
}

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.validate((valid) => {
        if (valid) {
            try {
                let divEl = document.createElement("div");
                divEl.innerHTML = form.text;
                const localres = divEl.textContent || divEl.innerText || "";

                const txt = localres.trim();

                result.value = txt;

                setTimeout(() => {
                    setTxtForFile(txt, form.trim);
                }, 500);
            } catch (err) {
                ElNotification({
                    title: "Error",
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
    txtDownload.value = "";
};
</script>
