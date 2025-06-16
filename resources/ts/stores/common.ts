import { defineStore } from "pinia";

import http from "../helpers/httpHelper";

export const useCommonStore = defineStore("common", {
    actions: {
        getHtpasswd(password: string) {
            return http
                .post("/api/get-htpasswd", { password })
                .then((res: { data: { htpasswd: string } }) => res.data);
        },
        getStingByUrl(url: string) {
            return http
                .post("/api/get-string-by-url", {
                    url,
                })
                .then((res: { data: { content: string } }) => res.data);
        },
    },
});
