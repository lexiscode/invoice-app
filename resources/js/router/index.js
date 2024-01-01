import { createRouter, createWebHistory } from "vue-router";

import invoiceIndex from '../components/invoices/index.vue';
import invoiceCreate from '../components/invoices/create.vue';
import invoiceShow from "../components/invoices/show.vue";
import notFound from "../components/NotFound.vue";

const routes = [
    {
        path: "/",
        component: invoiceIndex,
    },
    {
        path: "/invoice/create",
        component: invoiceCreate,
    },
    {
        path: "/invoice/show/:id",
        component: invoiceShow,
        props: true
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
