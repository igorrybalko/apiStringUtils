import { computed, onMounted, ref } from "vue";
import Cookies from "universal-cookie";

import { useCommonStore } from "./stores/common";

export default {
    setup() {
        const commonStore = useCommonStore();
        const cookies = new Cookies(null, {
            path: "/",
            httpOnly: false,
            secure: false,
        });

        const mainCont = ref<HTMLDivElement>();

        const darkTheme = computed(() => commonStore.darkTheme);

        function toggleTheme() {
            commonStore.darkTheme = !commonStore.darkTheme;
            const theme = cookies.get("theme");

            if (theme) {
                cookies.remove("theme");
                if (mainCont.value?.dataset.dark === "1") {
                    mainCont.value.dataset.dark = "0";
                }
            } else {
                cookies.set("theme", "1");
            }
        }

        onMounted(() => {
            const theme = cookies.get("theme");
            commonStore.darkTheme = Boolean(theme);
        });

        return {
            toggleTheme,
            darkTheme,
            mainCont,
        };
    },
};
