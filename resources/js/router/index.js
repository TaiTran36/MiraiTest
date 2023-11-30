import {createWebHistory, createRouter} from "vue-router";
import ImagePage from "../pages/Images/ImagePage.vue";
const routes = [
    {
        path: "/imports",
        name: "ProductDetails",
        component: ImagePage,
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
