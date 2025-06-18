<template>
    <div>
        <el-form :model="form" label-width="auto" ref="formRef">
            <div class="mb-5">
                <label class="el-form-item__label">Enter your JS code</label>
                <v-ace-editor
                    v-model:value="editorValue"
                    lang="javascript"
                    theme="chrome"
                    style="height: 250px"
                />
            </div>

            <AppLoadInput
                placeholder="https://"
                ref="loadInputRef"
                @update-data="updateData"
            />

            <el-form-item label="Tab size" label-position="top" prop="tabSize">
                <el-radio-group v-model="form.tabSize">
                    <el-radio :value="2">2</el-radio>
                    <el-radio :value="4">4</el-radio>
                </el-radio-group>
            </el-form-item>

            <el-form-item>
                <el-button type="primary" @click="submitForm(formRef)"
                    >Format</el-button
                >
                <el-button @click="resetForm(formRef)">Reset</el-button>
            </el-form-item>
        </el-form>
        <el-divider />
        <div class="mb-5">
            <label class="el-form-item__label">Result</label>
            <v-ace-editor
                v-model:value="result"
                lang="javascript"
                theme="chrome"
                style="height: 250px"
            />
        </div>
        <AppCopyBtn :text="result" />
        <AppDowloadBtn v-if="result" name="file.js" :content="result" />
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
import { VAceEditor } from "vue3-ace-editor";
// @ts-ignore
import jsBeautify from "js-beautify";

import "ace-builds/src-noconflict/mode-javascript";
import "ace-builds/src-noconflict/theme-chrome";
import "ace-builds/src-noconflict/ext-language_tools";

import AppCopyBtn from "../common/AppCopyBtn.vue";
import AppDowloadBtn from "../common/AppDowloadBtn.vue";
import AppLoadInput from "../common/AppLoadInput.vue";

import type { FormInstance } from "element-plus";

const loadInputRef = ref<InstanceType<typeof AppLoadInput>>();
const formRef = ref<FormInstance>();

const form = reactive({
    tabSize: 2,
});

const result = ref("");

const editorValue = ref("");

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    if (editorValue.value) {
        const str = editorValue.value.trim();

        result.value = jsBeautify(str, { indent_size: form.tabSize });
    }
};

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    result.value = "";
    editorValue.value = "";
    loadInputRef.value?.reset();
};

function updateData(val: string) {
    editorValue.value = val;
}
</script>
