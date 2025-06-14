<template>
    <div>
        <el-form :model="form" label-width="auto" ref="formRef">
            <el-upload
                ref="upload"
                v-model:file-list="form.img"
                list-type="picture"
                action="#"
                :auto-upload="false"
                :on-exceed="handleExceed"
                :limit="1"
                accept="image/png, image/jpeg, image/svg+xml, image/webp"
                :on-change="handleChange"
            >
                <el-button type="primary">Click to upload</el-button>
                <template #tip>
                    <div class="el-upload__tip">
                        jpg, png, webp, svg files with a size less than 9 mb
                    </div>
                </template>
            </el-upload>

            <el-form-item
                label="Output format"
                label-position="top"
                prop="format"
            >
                <el-select v-model="form.format">
                    <el-option label="Only Base64" value="simple" />
                    <el-option label="Data URI" value="dataUri" />
                    <el-option label="CSS Background Source" value="toCss" />
                    <el-option label="HTML Image Code" value="toHtml" />
                </el-select>
            </el-form-item>
            <el-form-item>
                <el-button
                    type="primary"
                    @click="submitForm(formRef)"
                    :loading="loading"
                    >Encode image to Base64</el-button
                >
                <el-button @click="resetForm(formRef)">Reset</el-button>
            </el-form-item>
        </el-form>
        <el-divider />
        <div class="caption">Result:</div>
        <div class="p-textarea mb-6">{{ result }}</div>
        <AppCopyBtn :text="result" />
        <AppDowloadBtn v-if="result" name="base64.txt" :content="result" />
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { reactive, ref } from "vue";
import { genFileId, ElNotification } from "element-plus";

import AppDowloadBtn from "../common/AppDowloadBtn.vue";
import AppCopyBtn from "../common/AppCopyBtn.vue";

import type {
    UploadInstance,
    UploadProps,
    UploadRawFile,
    FormInstance,
} from "element-plus";

type ConvertType = "simple" | "dataUri" | "toCss" | "toHtml";

type ImgForm = {
    format: ConvertType;
    img: any[];
};

const upload = ref<UploadInstance>();
const formRef = ref<FormInstance>();

const result = ref("");
const loading = ref(false);

const form = reactive<ImgForm>({
    format: "simple",
    img: [],
});

const handleExceed: UploadProps["onExceed"] = (files) => {
    upload.value!.clearFiles();
    const file = files[0] as UploadRawFile;
    file.uid = genFileId();
    upload.value!.handleStart(file);
};

const handleChange: UploadProps["onSuccess"] = (response) => {
    if (response.size > 9441674) {
        upload.value!.clearFiles();
        ElNotification({
            title: "Error",
            message: "An image size can not exceed 9 mb!",
            type: "error",
        });
    }
};

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    upload.value!.clearFiles();
    result.value = "";
};

const converter = {
    simple(str: string) {
        const arr = str.split(";base64,");
        return arr[1];
    },
    dataUri(str: string) {
        return str;
    },
    toCss(str: string) {
        return "background-image: url(" + str + ");";
    },
    toHtml(str: string) {
        return '<img src="' + str + '" alt="" />';
    },
};

const submitForm = async (formEl: FormInstance | undefined) => {
    if (!formEl) return;

    if (form.img.length) {
        loading.value = true;

        try {
            const reader = new FileReader();
            reader.onloadend = () => {
                const rawStr = reader.result;
                if (rawStr) {
                    result.value = converter[form.format](rawStr as string);
                    loading.value = false;
                }
            };
            reader.readAsDataURL(form.img[0].raw);
        } catch (err) {
            console.log(err);
            loading.value = false;
            ElNotification({
                title: "Error",
                type: "error",
            });
        }
    }
};
</script>
