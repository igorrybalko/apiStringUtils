<template>
    <div class="wrapper app-share">
        <div class="mb-6">
            <div class="mb-2">Share:</div>

            <div class="flex">
                <div class="mr-2">
                    <a
                        :href="
                            'https://www.facebook.com/sharer/sharer.php?u=' +
                            url
                        "
                        target="_blank"
                        rel="nofollow noreferrer"
                    >
                        <img
                            width="32"
                            height="32"
                            src="/img/icon-fb.svg"
                            alt="icon fb"
                        />
                    </a>
                </div>
                <div class="mr-2">
                    <a
                        :href="`https://x.com/share?&url=${url}`"
                        target="_blank"
                        rel="nofollow noreferrer"
                    >
                        <img
                            width="32"
                            height="32"
                            src="/img/icon-x.svg"
                            alt="icon x"
                        />
                    </a>
                </div>
                <div class="mr-2">
                    <a
                        :href="
                            'https://www.linkedin.com/sharing/share-offsite/?url=' +
                            url
                        "
                        target="_blank"
                        rel="nofollow noreferrer"
                    >
                        <img
                            width="32"
                            height="32"
                            src="/img/icon-ld.svg"
                            alt="icon ld"
                        />
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed } from "vue";

const url = computed(() => location.href);
</script>
