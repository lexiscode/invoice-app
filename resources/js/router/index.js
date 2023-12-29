import { createRouter, createWebHistory } from "vue-router";

import invoiceIndex from '../components/invoices/index.vue';
import invoiceCreate from '../components/invoices/create.vue';
import notFound from "../components/NotFound.vue";

const routes = [
    {
        path: "/",
        component: invoiceIndex,
    },
    {
        path: "/invoice/new",
        component: invoiceCreate,
    },
    {
        path: "/:pathMatch(.*)*",
        component: notFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
