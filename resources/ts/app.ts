import { createApp, defineAsyncComponent } from "vue";
import ElementPlus from "element-plus";
import "element-plus/dist/index.css";
import { createPinia } from "pinia";

import AppShare from "./components/global/AppShare.vue";

const pinia = createPinia();
const app = createApp({}).use(ElementPlus).component("AppShare", AppShare);
app.use(pinia);

function initMainComp(cName, path) {
    const comp = defineAsyncComponent(() => import(/* @vite-ignore */ path));
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

    case "/htpasswd": {
        const cName = "HtpasswdPage";
        initMainComp(cName, "./components/hash/" + cName + ".vue");
        break;
    }

    case "/md5-generator": {
        const cName = "Md5Page";
        initMainComp(cName, "./components/hash/" + cName + ".vue");
        break;
    }

    case "/sha-256": {
        const cName = "Sha256Page";
        initMainComp(cName, "./components/hash/" + cName + ".vue");
        break;
    }

    case "/translit-url": {
        const cName = "TranslitUrlPage";
        initMainComp(cName, "./components/string/" + cName + ".vue");
        break;
    }

    case "/case-converter": {
        const cName = "CaseConverterPage";
        initMainComp(cName, "./components/text/" + cName + ".vue");
        break;
    }

    case "/word-counter": {
        const cName = "WordCounterPage";
        initMainComp(cName, "./components/text/" + cName + ".vue");
        break;
    }

    case "/strip-tags": {
        const cName = "StripTagsPage";
        initMainComp(cName, "./components/text/" + cName + ".vue");
        break;
    }

    case "/unixtimestamp": {
        const cName = "UnixtimestampPage";
        initMainComp(cName, "./components/time/" + cName + ".vue");
        break;
    }
}

app.mount("#root");
