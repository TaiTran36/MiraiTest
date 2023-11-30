<template>
    <div class="container-layout-box">
        <SidebarDev></SidebarDev>
        <ContainerDev></ContainerDev>
    </div>
</template>

<script>
import SidebarDev from "./sidebars/SidebarDev.vue";
import ContainerDev from "./containers/ContainerDev.vue";
export default {
    name: "LayoutDev",
    components: {
        SidebarDev,
        ContainerDev
    }
}
</script>

<style scoped>
.container-layout-box {
    height: 100%;
    display: flex;
    gap: 20px;
}
</style>
