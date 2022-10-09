import { createApp } from 'vue'
import './style.css'
import router from './config/router.js'
import App from './config/App.vue'

const app = createApp(App);

app.use(router).mount('#app');
