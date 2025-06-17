<template>
    <div>
        <el-form label-width="auto">
            <div class="mb-5">
                <label class="el-form-item__label">Enter your CSS</label>
                <v-ace-editor
                    v-model:value="editorValue"
                    lang="css"
                    theme="chrome"
                    style="height: 250px"
                />
            </div>

            <AppLoadInput
                placeholder="https://"
                ref="loadInputRef"
                @update-data="updateData"
            />

            <el-form-item>
                <el-button type="primary" @click="submitForm()"
                    >Minify</el-button
                >
                <el-button @click="resetForm()">Reset</el-button>
            </el-form-item>
        </el-form>
        <el-divider />
        <div class="mb-5">
            <label class="el-form-item__label">Result</label>
            <v-ace-editor
                v-model:value="result"
                lang="css"
                theme="chrome"
                style="height: 250px"
            />
        </div>
        <AppCopyBtn :text="result" />
        <AppDowloadBtn v-if="result" name="file.css" :content="result" />
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { VAceEditor } from "vue3-ace-editor";
import { minify } from "csso";

import "ace-builds/src-noconflict/mode-css";
import "ace-builds/src-noconflict/theme-chrome";
import "ace-builds/src-noconflict/ext-language_tools";

import AppCopyBtn from "../common/AppCopyBtn.vue";
import AppDowloadBtn from "../common/AppDowloadBtn.vue";
import AppLoadInput from "../common/AppLoadInput.vue";

const loadInputRef = ref<InstanceType<typeof AppLoadInput>>();

const result = ref("");

const editorValue = ref("");

const submitForm = () => {
    if (editorValue.value) {
        const str = editorValue.value.trim();
        const data = minify(str);

        result.value = data.css;
    }
};

const resetForm = () => {
    result.value = "";
    editorValue.value = "";
    loadInputRef.value?.reset();
};

function updateData(val: string) {
    editorValue.value = val;
}
</script>
