import './bootstrap';

import { createApp } from 'vue'
// import Test from './ /components/Test'
import Index from './components/Index.vue'
import Home from './components/Home.vue'
import SignUp from './components/SignUp.vue'
import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Home },
        { path: '/signup', component: SignUp },
    ]
});
const app = createApp(Index)

// router.use(app)
app.use(router).mount('#app')