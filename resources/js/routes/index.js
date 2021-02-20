
import HomePage from '../components/HomePage.vue';
import LoginPage from '../components/Auth/LoginPage.vue';

export const routes = [
    {
        path: '/',
        component: HomePage,
        name: 'Home'
    },
    {
        path: '/login',
        component: LoginPage,
        name: 'Login'
    },
];
