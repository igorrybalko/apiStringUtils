import { createApp, defineAsyncComponent } from "vue";
import ElementPlus from "element-plus";
import "element-plus/dist/index.css";

import AppShare from "./components/AppShare.vue";

const app = createApp({}).use(ElementPlus).component("AppShare", AppShare);

function initMainComp(cName, path) {
    const comp = defineAsyncComponent(() => import(/* @vite-ignore */path));
    app.component(cName, comp);
}

switch (location.pathname) {
    case "/url-encode": {
        const cName = "UrlEncodePage";
        initMainComp(cName, "./components/string/" + cName + ".vue");
        break;
    }

    case "/url-decode": {
        const cName = "UrlDecodePage";
        initMainComp(cName, "./components/string/" + cName + ".vue");
        break;
    }

    case "/base64-encode": {
        const cName = "Base64EncodePage";
        initMainComp(cName, "./components/base64/" + cName + ".vue");
        break;
    }

    case "/base64-decode": {
        const cName = "Base64DecodePage";
        initMainComp(cName, "./components/base64/" + cName + ".vue");
        break;
    }

    case "/img-to-base64": {
        const cName = "ImgToBase64Page";
        initMainComp(cName, "./components/base64/" + cName + ".vue");
        break;
    }
}

app.mount("#root");
