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
            <el-form-item prop="trim">
                <el-checkbox v-model="form.trim"
                    >Trim start and end spaces</el-checkbox
                >
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(formRef)"
                    >Count</el-button
                >
                <el-button @click="resetForm(formRef)">Reset</el-button>
            </el-form-item>
        </el-form>
        <el-divider />
        <div class="caption">Result:</div>
        <div class="mb-2">
            All symbols: <el-tag effect="plain">{{ countAllSymbols }}</el-tag>
        </div>
        <div class="mb-2">
            Symbols without spaces:
            <el-tag effect="plain">{{ countWithoutSpace }}</el-tag>
        </div>
        <div>
            Words: <el-tag effect="plain">{{ cntWords }}</el-tag>
        </div>
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
import { ElNotification } from "element-plus";

import type { FormInstance, FormRules } from "element-plus";

interface RuleForm {
    text: string;
    trim: boolean;
}

const formRef = ref<FormInstance>();

const form = reactive({
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

const countAllSymbols = ref(0);
const countWithoutSpace = ref(0);
const cntWords = ref(0);

const countWords = (str: string) => {
    str = str.trim();
    const words = str.match(/\S+/g);

    if (words) {
        return words.length;
    }
    return 0;
};

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.validate((valid) => {
        if (valid) {
            try {
                let str = form.text;
                if (form.trim) {
                    str = str.trim();
                }

                countAllSymbols.value = str.length;

                const withoutSpace = str.replace(/\s/g, "").length;
                countWithoutSpace.value = withoutSpace;

                cntWords.value = countWords(str);
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
    countAllSymbols.value = 0;
    countWithoutSpace.value = 0;
    cntWords.value = 0;
};
</script>
