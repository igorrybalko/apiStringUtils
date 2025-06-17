import { computed } from "vue";
import Cookies from "universal-cookie";

import { useCommonStore } from "./stores/common";

export default {
    setup() {
        const commonStore = useCommonStore();
        const cookies = new Cookies(null, { path: "/" });

        const darkTheme = computed(() => commonStore.darkTheme);

        function toggleTheme() {
            commonStore.darkTheme = !commonStore.darkTheme;
            const theme = cookies.get("theme");

            console.log(theme);

            if (theme) {
                cookies.remove("theme");
            } else {
                cookies.set("theme", "1");
            }
        }

        return {
            toggleTheme,
            darkTheme,
        };
    },
};
