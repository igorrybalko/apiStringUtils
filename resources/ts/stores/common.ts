import { defineStore } from "pinia";

import http from "../helpers/httpHelper";

export const useCommonStore = defineStore("common", {
    actions: {
        getHtpasswd(password: string) {
            return http
                .post("/api/get-htpasswd", { password })
                .then((res: { data: { htpasswd: string } }) => res.data);
        },
    },
});
