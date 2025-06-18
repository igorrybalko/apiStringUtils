<template>
    <div className="mb-6">
        <div id="ntv_2100164"></div>
    </div>
</template>

<script setup lang="ts">
import { onMounted } from "vue";

onMounted(() => {
    let imagewidth = 285;

    if (window.innerWidth < 1366 && window.innerWidth > 767) {
        imagewidth = 200;
    }

    (function (d) {
        var params = {
            bvwidgetid: "ntv_2100164",
            bvlinksownid: 2100164,
            rows: 1,
            cols: 1,
            textpos: "below",
            imagewidth,
            mobilecols: 1,
            cb: new Date().getTime(),
        };
        params.bvwidgetid = "ntv_2100164" + params.cb;
        // @ts-ignore
        d.getElementById("ntv_2100164").id = params.bvwidgetid;
        var qs = Object.keys(params)
            .reduce(function (a, k) {
                // @ts-ignore
                a.push(k + "=" + encodeURIComponent(params[k]));
                return a;
            }, [])
            .join(String.fromCharCode(38));
        var s = d.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        var p = "https:" == document.location.protocol ? "https" : "http";
        s.src =
            p +
            "://cdn.hyperpromote.com/bidvertiser/tags/active/bdvws.js?" +
            qs;
        // @ts-ignore
        d.getElementById(params.bvwidgetid).appendChild(s);
    })(document);
});
</script>
