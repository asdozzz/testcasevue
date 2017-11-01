import Vue from 'vue'
import Router from 'vue-router'
import ProjectsRoutes from '../module/projects/routes.js';
import PlansRoutes from '../module/plans/routes.js';
import HomeRoutes from '../module/home/routes.js';

Vue.use(Router);

let router = new Router({
    mode: 'history',
    routes: [
        HomeRoutes,
        ProjectsRoutes
    ]
});


export default router;
