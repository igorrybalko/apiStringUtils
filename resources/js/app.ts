import { createApp, defineAsyncComponent } from "vue";
import ElementPlus from "element-plus";
import "element-plus/dist/index.css";
import { createPinia } from "pinia";
import piniaPluginPersistedstate from "pinia-plugin-persistedstate";
import * as ElementPlusIconsVue from "@element-plus/icons-vue";

import AppShare from "./components/global/AppShare.vue";
import AppBid from "./components/global/AppBid.vue";
import root from "./root";

const pinia = createPinia();
pinia.use(piniaPluginPersistedstate);

const app = createApp(root)
    .use(ElementPlus)
    .component("AppShare", AppShare)
    .component("AppBid", AppBid);

app.use(pinia);

for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
    app.component(key, component);
}

switch (location.pathname) {
    case "/url-encode": {
        const comp = defineAsyncComponent(
            () => import("./components/string/UrlEncodePage.vue")
        );
        app.component("UrlEncodePage", comp);
        break;
    }

    case "/url-decode": {
        const comp = defineAsyncComponent(
            () => import("./components/string/UrlDecodePage.vue")
        );
        app.component("UrlDecodePage", comp);
        break;
    }

    case "/base64-encode": {
        const comp = defineAsyncComponent(
            () => import("./components/base64/Base64EncodePage.vue")
        );
        app.component("Base64EncodePage", comp);
        break;
    }

    case "/base64-decode": {
        const comp = defineAsyncComponent(
            () => import("./components/base64/Base64DecodePage.vue")
        );
        app.component("Base64DecodePage", comp);
        break;
    }

    case "/img-to-base64": {
        const comp = defineAsyncComponent(
            () => import("./components/base64/ImgToBase64Page.vue")
        );
        app.component("ImgToBase64Page", comp);
        break;
    }

    case "/htpasswd": {
        const comp = defineAsyncComponent(
            () => import("./components/hash/HtpasswdPage.vue")
        );
        app.component("HtpasswdPage", comp);
        break;
    }

    case "/md5-generator": {
        const comp = defineAsyncComponent(
            () => import("./components/hash/Md5Page.vue")
        );
        app.component("Md5Page", comp);
        break;
    }

    case "/sha-256": {
        const comp = defineAsyncComponent(
            () => import("./components/hash/Sha256Page.vue")
        );
        app.component("Sha256Page", comp);
        break;
    }

    case "/translit-url": {
        const comp = defineAsyncComponent(
            () => import("./components/string/TranslitUrlPage.vue")
        );
        app.component("TranslitUrlPage", comp);
        break;
    }

    case "/case-converter": {
        const comp = defineAsyncComponent(
            () => import("./components/text/CaseConverterPage.vue")
        );
        app.component("CaseConverterPage", comp);
        break;
    }

    case "/word-counter": {
        const comp = defineAsyncComponent(
            () => import("./components/text/WordCounterPage.vue")
        );
        app.component("WordCounterPage", comp);
        break;
    }

    case "/strip-tags": {
        const comp = defineAsyncComponent(
            () => import("./components/text/StripTagsPage.vue")
        );
        app.component("StripTagsPage", comp);
        break;
    }

    case "/unixtimestamp": {
        const comp = defineAsyncComponent(
            () => import("./components/time/UnixtimestampPage.vue")
        );
        app.component("UnixtimestampPage", comp);
        break;
    }

    case "/uuid": {
        const comp = defineAsyncComponent(
            () => import("./components/hash/UuidPage.vue")
        );
        app.component("UuidPage", comp);
        break;
    }

    case "/json-stringify": {
        const comp = defineAsyncComponent(
            () => import("./components/text/JsonStringifyPage.vue")
        );
        app.component("JsonStringifyPage", comp);
        break;
    }

    case "/json-minify": {
        const comp = defineAsyncComponent(
            () => import("./components/formatter/JsonMinifyPage.vue")
        );
        app.component("JsonMinifyPage", comp);
        break;
    }

    case "/html-formatter": {
        const comp = defineAsyncComponent(
            () => import("./components/formatter/FormatterHtmlPage.vue")
        );
        app.component("FormatterHtmlPage", comp);
        break;
    }

    case "/minify-css": {
        const comp = defineAsyncComponent(
            () => import("./components/formatter/MinifyCssPage.vue")
        );
        app.component("MinifyCssPage", comp);
        break;
    }

    case "/beautify-css": {
        const comp = defineAsyncComponent(
            () => import("./components/formatter/BeautifyCssPage.vue")
        );
        app.component("BeautifyCssPage", comp);
        break;
    }

    case "/beautify-js": {
        const comp = defineAsyncComponent(
            () => import("./components/formatter/BeautifyJsPage.vue")
        );
        app.component("BeautifyJsPage", comp);
        break;
    }
}

app.mount("#root");
