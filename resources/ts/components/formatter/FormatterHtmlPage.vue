<template>
    <div>
        <el-form :model="form" label-width="auto" ref="formRef">
            <div class="mb-5">
                <v-ace-editor
                    v-model:value="editorValue"
                    lang="html"
                    theme="chrome"
                    style="height: 250px"
                />
            </div>

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
            <v-ace-editor
                v-model:value="result"
                lang="html"
                theme="chrome"
                style="height: 250px"
            />
        </div>
        <AppCopyBtn :text="result" />
        <AppDowloadBtn v-if="result" name="base64.html" :content="result" />
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
import { VAceEditor } from "vue3-ace-editor";
import { prettify } from "htmlfy";

import "ace-builds/src-noconflict/mode-html";
import "ace-builds/src-noconflict/theme-chrome";
import "ace-builds/src-noconflict/ext-language_tools";

import AppCopyBtn from "../common/AppCopyBtn.vue";
import AppDowloadBtn from "../common/AppDowloadBtn.vue";

import type { FormInstance } from "element-plus";

const formRef = ref<FormInstance>();

const form = reactive({
    tabSize: 2,
});

const result = ref("");
const url = ref("");
const loading = ref(false);

const editorValue = ref("");

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    if (editorValue.value) {
        const html = editorValue.value.trim();
        let str = html;

        const doctype = html.slice(0, 15).toLowerCase();

        if (doctype === "<!doctype html>") {
            str = html.slice(15);
        }

        let txt = prettify(str, {
            tab_size: form.tabSize,
        });

        if (doctype === "<!doctype html>") {
            txt = `<!DOCTYPE html>\n${txt}`;
        }

        result.value = txt;
    }
};

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    result.value = "";
    url.value = "";
    editorValue.value = "";
};
</script>
