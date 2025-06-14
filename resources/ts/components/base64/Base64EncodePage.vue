<template>
    <div>
        <el-form
            :model="form"
            label-width="auto"
            ref="formRef"
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
                <el-button type="primary" @click="submitForm(formRef)"
                    >Encode</el-button
                >
                <el-button @click="resetForm(formRef)">Reset</el-button>
            </el-form-item>
        </el-form>
        <el-divider />
        <div class="caption">Result in Base64:</div>
        <div class="p-textarea mb-6">{{ result }}</div>
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

function b64EncodeUnicode(str: string) {
  // first we use encodeURIComponent to get percent-encoded UTF-8,
  // then we convert the percent encodings into raw bytes which
  // can be fed into btoa.
  return btoa(
   encodeURIComponent(str).replace(
    /%([0-9A-F]{2})/g,
    function toSolidBytes(_match, p1) {
     return String.fromCharCode(parseInt('0x' + p1, 16));
    }
   )
  );
 }

const submitForm = async (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    await formEl.validate((valid) => {
        if (valid) {
            result.value = b64EncodeUnicode(form.text);
        }
    });
};

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    result.value = "";
};
</script>
