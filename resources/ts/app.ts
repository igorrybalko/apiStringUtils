import { createApp, defineAsyncComponent } from "vue";
import ElementPlus from "element-plus";
import "element-plus/dist/index.css";
import { createPinia } from "pinia";
import piniaPluginPersistedstate from "pinia-plugin-persistedstate";

import AppShare from "./components/global/AppShare.vue";
import root from "./root";

const pinia = createPinia();
pinia.use(piniaPluginPersistedstate);

const app = createApp(root).use(ElementPlus).component("AppShare", AppShare);
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

    case "/uuid": {
        const cName = "UuidPage";
        initMainComp(cName, "./components/hash/" + cName + ".vue");
        break;
    }

    case "/json-stringify": {
        const cName = "JsonStringifyPage";
        initMainComp(cName, "./components/text/" + cName + ".vue");
        break;
    }

    case "/json-minify": {
        const cName = "JsonMinifyPage";
        initMainComp(cName, "./components/formatter/" + cName + ".vue");
        break;
    }

    case "/html-formatter": {
        const cName = "FormatterHtmlPage";
        initMainComp(cName, "./components/formatter/" + cName + ".vue");
        break;
    }

    case "/minify-css": {
        const cName = "MinifyCssPage";
        initMainComp(cName, "./components/formatter/" + cName + ".vue");
        break;
    }

    case "/beautify-css": {
        const cName = "BeautifyCssPage";
        initMainComp(cName, "./components/formatter/" + cName + ".vue");
        break;
    }

    case "/beautify-js": {
        const cName = "BeautifyJsPage";
        initMainComp(cName, "./components/formatter/" + cName + ".vue");
        break;
    }
}

app.mount("#root");
