
import HomePage from '../components/HomePage.vue';
import LoginPage from '../components/Auth/LoginPage.vue';
import SignupPage from '../components/Auth/SignupPage.vue';
import DashboardPage from '../components/Dashboard/DashboardPage.vue';

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
    {
        path: '/signup',
        component: SignupPage,
        name: 'Signup'
    },
    {
        path: '/dashboard',
        component: DashboardPage,
        name: 'Signup'
    },
];
