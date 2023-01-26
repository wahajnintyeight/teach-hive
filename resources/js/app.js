import './bootstrap';

import { createApp } from 'vue'
// import Test from './ /components/Test'
import Index from './components/Index.vue'
import Home from './components/Home.vue'
import SignUp from './components/SignUp.vue'
import SignIn from './components/SignIn.vue'
import Courses from './components/Courses.vue'

import { createRouter, createWebHistory } from 'vue-router';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Home },
        { path: '/signup', component: SignUp },
        { path: '/signin', component: SignIn },
        { path: '/courses', component: Courses }
    ]
});
const app = createApp(Index)

// router.use(app)
app.use(router).use(VueSweetalert2).mount('#app')