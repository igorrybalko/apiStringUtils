<template>
    <div>
        <el-form ref="formRef" :model="form" :rules="rules">
            <div
                class="grid xs:grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-x-4"
            >
                <el-form-item label="Year" label-position="top" prop="year">
                    <el-input
                        v-model="form.year"
                        type="number"
                        placeholder="YYYY"
                    />
                </el-form-item>

                <el-form-item label="Month" label-position="top" prop="month">
                    <el-input
                        v-model="form.month"
                        type="number"
                        placeholder="MM"
                        min="1"
                        max="12"
                    />
                </el-form-item>

                <el-form-item label="Day" label-position="top" prop="day">
                    <el-input
                        v-model="form.day"
                        type="number"
                        placeholder="DD"
                        min="1"
                        max="31"
                    />
                </el-form-item>

                <el-form-item
                    label="Hour (24 hour)"
                    label-position="top"
                    prop="hour"
                >
                    <el-input
                        v-model="form.hour"
                        type="number"
                        placeholder="HH"
                        min="0"
                        max="24"
                    />
                </el-form-item>

                <el-form-item
                    label="Minutes"
                    label-position="top"
                    prop="minutes"
                >
                    <el-input
                        v-model="form.minutes"
                        type="number"
                        placeholder="MM"
                        min="0"
                        max="59"
                    />
                </el-form-item>

                <el-form-item
                    label="Seconds"
                    label-position="top"
                    prop="seconds"
                >
                    <el-input
                        v-model="form.seconds"
                        type="number"
                        placeholder="SS"
                        min="0"
                        max="59"
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
    </div>
</template>

<script setup lang="ts">
import { reactive, ref, onMounted } from "vue";
import { ElNotification } from "element-plus";

import type { FormInstance, FormRules } from "element-plus";

type TableRow = {
    cap: string;
    val: string;
};

interface RuleForm {
    year: string;
    month: string;
    day: string;
    hour: string;
    minutes: string;
    seconds: string;
}

const formRef = ref<FormInstance>();

const form = reactive({
    year: "",
    month: "",
    day: "",
    hour: "",
    minutes: "",
    seconds: "",
});

const requiredRule = {
    required: true,
    message: "Required",
    trigger: "blur",
};

const rules = reactive<FormRules<RuleForm>>({
    year: requiredRule,
    month: requiredRule,
    day: requiredRule,
    hour: requiredRule,
    minutes: requiredRule,
    seconds: requiredRule,
});

const dataSource = ref<TableRow[]>([]);

const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.resetFields();
    dataSource.value = [];
};

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return;
    formEl.validate((valid) => {
        if (valid) {
            const { year, month, day, hour, minutes, seconds } = form;

            const date = new Date(
                Number(year),
                Number(month) - 1,
                Number(day),
                Number(hour),
                Number(minutes),
                Number(seconds)
            );

            if (isNaN(Number(date))) {
                ElNotification({
                    title: "Error",
                    message: "invalid date",
                    type: "error",
                });
            } else {
                const time = Math.floor(date.getTime() / 1000);

                dataSource.value = [
                    {
                        cap: "Unix Timestamp",
                        val: String(time),
                    },
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
    const date = new Date();

    form.year = String(date.getFullYear());
    form.month = String(date.getMonth() + 1);
    form.day = String(date.getDate());
    form.hour = String(date.getHours());
    form.minutes = String(date.getMinutes());
    form.seconds = String(date.getSeconds());
});
</script>
