import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import AdminBillboards from "@/views/AdminBillboards";
import Admin from "@/views/Admin";
import BillboardPanel from "@/views/BillboardPanel";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/admin",
    name: "Admin",
    component: Admin,
  },
  {
    path: "/admin/billboards",
    name: "AdminBillboards",
    component: AdminBillboards,
  },
  {
    path: "/admin/billboard/:id",
    name: "BillboardPanel",
    component: BillboardPanel,
  },
  {
    path: "/admin/billboard/new",
    name: "AddNewBillboard",
    component: BillboardPanel,
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
