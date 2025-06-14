<template>
    <div>
        <el-form :model="form" label-width="auto" ref="formRef" :rules="rules">
            <el-form-item label="Enter text" label-position="top" prop="text">
                <el-input
                    v-model="form.text"
                    type="text"
                    placeholder="Type your text..."
                />
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm(formRef)"
                    >Submit</el-button
                >
                <el-button @click="resetForm(formRef)">Reset</el-button>
            </el-form-item>
        </el-form>
        <el-divider />
        <div class="caption">Result:</div>
        <div class="p-input mb-6">{{ result }}</div>
        <AppCopyBtn :text="result" />
        <el-divider />
        <div class="info-text">
            <h3>Rules:</h3>
            <div class="mb-6">
                <div class="mb-2">The letters of the Latin alphabet and numbers do not change</div>
                <div>
                    Symbols
                    <el-tag effect="plain" class="mr-2 ml-1">-</el-tag>
                    <el-tag effect="plain" class="mr-2">_</el-tag>
                    <el-tag effect="plain" class="mr-2">space</el-tag>
                    <el-tag effect="plain" class="mr-2">+</el-tag>
                    are converted to
                    <el-tag effect="plain" class="ml-1">-</el-tag>
                </div>
            </div>
            <el-table :data="tableData" style="width: 100%">
                <el-table-column prop="from0" label="From" width="66" />
                <el-table-column prop="to0" label="To" width="66" />
                <el-table-column prop="address" label="" width="20" />

                <el-table-column prop="from1" label="From" width="66" />
                <el-table-column prop="to1" label="To" width="66" />
                <el-table-column prop="address" label="" width="20" />

                <el-table-column prop="from2" label="From" width="66" />
                <el-table-column prop="to2" label="To" width="66" />
                <el-table-column prop="address" label="" width="20" />

                <el-table-column prop="from3" label="From" width="66" />
                <el-table-column prop="to3" label="To" width="66" />
                <el-table-column prop="address" label="" width="20" />

                <el-table-column prop="from4" label="From" width="66" />
                <el-table-column prop="to4" label="To" width="66" />
                <el-table-column prop="address" label="" width="20" />

                <el-table-column prop="from5" label="From" width="66" />
                <el-table-column prop="to5" label="To" width="66" />
            </el-table>
        </div>
        <el-divider />
    </div>
</template>

<script setup lang="ts">
import { reactive, ref, computed } from "vue";
import chunk from "lodash.chunk";

import AppCopyBtn from "../common/AppCopyBtn.vue";

import type { FormInstance, FormRules } from "element-plus";

interface RuleForm {
    text: string;
}

const cyrLetters = {
    а: "a",
    б: "b",
    в: "v",
    г: "g",
    д: "d",
    е: "e",
    ё: "e",
    ж: "zh",
    з: "z",
    и: "i",
    й: "y",
    к: "k",
    л: "l",
    м: "m",
    н: "n",
    о: "o",
    п: "p",
    р: "r",
    с: "s",
    т: "t",
    у: "u",
    ф: "f",
    х: "h",
    ц: "c",
    ч: "ch",
    ш: "sh",
    щ: "sch",
    ь: "",
    ы: "y",
    ъ: "",
    э: "e",
    ю: "yu",
    я: "ya",
    ї: "i",
    ñ: "n",
    ґ: "g",
    і: "i",
};

const latinLetters = {
    a: "a",
    b: "b",
    c: "c",
    d: "d",
    e: "e",
    f: "f",
    g: "g",
    h: "h",
    i: "i",
    j: "j",
    k: "k",
    l: "l",
    m: "m",
    n: "n",
    o: "o",
    p: "p",
    q: "q",
    r: "r",
    s: "s",
    t: "t",
    u: "u",
    v: "v",
    w: "w",
    x: "x",
    y: "y",
    z: "z",
};

const converter = {
    ...cyrLetters,
    ...latinLetters,
    "0": "0",
    "1": "1",
    "2": "2",
    "3": "3",
    "4": "4",
    "5": "5",
    "6": "6",
    "7": "7",
    "8": "8",
    "9": "9",
};

function cyr2translit(cyrtext: string) {
    const symbols = ["-", "_", " ", "+"];

    let str = cyrtext;

    str = str.trim().toLowerCase();

    let convStr = "";

    for (let i = 0; i < str.length; i++) {
        if (str[i] in converter) {
            convStr += converter[str[i] as keyof typeof converter];
        } else {
            if (symbols.includes(str[i])) {
                convStr += "-";
            }
        }
    }

    return convStr;
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

const tableData = computed(() => {
    const convArr = Object.entries(cyrLetters);
    const rawArr = chunk(convArr, 6);
    return rawArr.map((el, i) => {
        return {
            from0: el[0][0],
            to0: el[0][1],
            space0: "",
            from1: el[1] ? el[1][0] : "",
            to1: el[1] ? el[1][1] : "",
            space1: "",
            from2: el[2] ? el[2][0] : "",
            to2: el[2] ? el[2][1] : "",
            space2: "",
            from3: el[3] ? el[3][0] : "",
            to3: el[3] ? el[3][1] : "",
            space3: "",
            from4: el[4] ? el[4][0] : "",
            to4: el[4] ? el[4][1] : "",
            space4: "",
            from5: el[5] ? el[5][0] : "",
            to5: el[5] ? el[5][1] : "",
        };
    });
});

const submitForm = async (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    await formEl.validate((valid) => {
        if (valid) {
            result.value = cyr2translit(form.text);
        }
    });
};

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    result.value = "";
};
</script>
