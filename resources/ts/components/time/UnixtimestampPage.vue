<template>
    <div>
        <div>
            <h3>Current Unix epoch time</h3>

            <p>
                <span @mouseenter="stopTimer" @mouseleave="startTimer">
                    <strong>{{ currentTime }}</strong>
                </span>
            </p>

            <p>Seconds since Jan 01 1970</p>

            <el-button
                type="primary"
                @click="copyTimestamp"
                :icon="CopyDocument"
            >
                Copy Timestamp
            </el-button>
        </div>
        <el-divider />

        <el-form ref="formRef" :model="form" :rules="rules">
            <div class="lg:w-1/6">
                <el-form-item
                    label="Timestamp in seconds"
                    label-position="top"
                    prop="timestamp"
                >
                    <el-input
                        v-model="form.timestamp"
                        type="number"
                        :placeholder="placeholder"
                    />
                </el-form-item>
            </div>
            <el-form-item>
                <el-button type="primary" @click="submitForm(formRef)"
                    >Convert</el-button
                >
                <el-button @click="resetForm(formRef)">Reset</el-button>
            </el-form-item>
        </el-form>
        <div class="pt-6" v-if="dataSource.length">
            <el-table
                :data="dataSource"
                style="width: 100%"
                :show-header="false"
            >
                <el-table-column prop="cap" width="120" />
                <el-table-column prop="val" />
            </el-table>
        </div>

        <el-divider />
        <AppUtFullDate />
    </div>
</template>

<script setup lang="ts">
import { ref, reactive, onMounted } from "vue";
import { CopyDocument } from "@element-plus/icons-vue";
import { ElNotification } from "element-plus";
import copy from "copy-to-clipboard";

import AppUtFullDate from "./AppUtFullDate.vue";

import type { FormInstance, FormRules } from "element-plus";

interface RuleForm {
    timestamp: string;
}

type TableRow = {
    cap: string;
    val: string;
};

const currentTime = ref(0);
const timer = ref<ReturnType<typeof setInterval> | null>(null);
const placeholder = ref("");

const dataSource = ref<TableRow[]>([]);

const formRef = ref<FormInstance>();

const form = reactive({
    timestamp: "",
});

const rules = reactive<FormRules<RuleForm>>({
    timestamp: {
        required: true,
        message: "Please enter timestamp",
        trigger: "blur",
    },
});

function stopTimer() {
    if (timer.value) {
        clearInterval(timer.value);
    }
}

function getCurrentTimestamp() {
    const time = Math.floor(new Date().getTime() / 1000);
    return time;
}

function startTimer() {
    timer.value = setInterval(() => {
        currentTime.value = getCurrentTimestamp();
    }, 1000);
}

function copyTimestamp() {
    copy(String(currentTime.value));

    ElNotification({
        title: "Copied",
        message: String(currentTime.value),
        type: "success",
    });
}

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    dataSource.value = [];
};

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.validate((valid) => {
        if (valid) {
            const date = new Date(Number(form.timestamp) * 1000);

            if (isNaN(Number(date))) {
                ElNotification({
                    title: "Error",
                    message: "invalid date",
                    type: "error",
                });
            } else {
                dataSource.value = [
                    {
                        cap: "GMT",
                        val: date.toUTCString(),
                    },
                    {
                        cap: "Local time",
                        val: date.toString(),
                    },
                ];
            }
        }
    });
};

onMounted(() => {
    startTimer();

    placeholder.value = String(getCurrentTimestamp());
});
</script>
