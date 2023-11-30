
import {createApp} from 'vue';
import {createPinia} from "pinia";
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import './bootstrap';


import App from './App.vue';
import axios from 'axios';
import router from './router';
const pinia = createPinia();
pinia.use(piniaPluginPersistedstate)

const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.use(router);
app.use(pinia);
app.mount('#app');
