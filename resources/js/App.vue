<template>
    <component :is="layout">
        <router-view/>
    </component>
</template>
<script>
import LayoutDev from "./layouts/LayoutDev.vue";
    export default {
        name: "App",
        components: {
            LayoutDev
        },
        data() {
            return {
                layout: null,
            };
        },
        watch: {
            $route(to) {
                if (to.meta.layout !== undefined) {
                    this.layout = to.meta.layout
                } else {
                    this.layout = "LayoutDev"
                }
            },
        }
    }
</script>
<style>
html,
body {
    height: 100%;
}

#app {
    height: 100%;
}
</style>
