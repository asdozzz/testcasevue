// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex'
import Start from './Start.vue';
import router from './router';
import store from './store';
import mdMixin from './mixin/my';
import Toasted from 'vue-toasted';
import 'vuetify/dist/vuetify.min.css';
import Vuetify from 'vuetify';
import ru from 'vee-validate/dist/locale/ru';
import VeeValidate, { Validator } from 'vee-validate';
import wysiwyg from "vue-wysiwyg";
import MyTree from './components/my/tree/tree.vue';
import MyBreadcrumbs from './components/my/breadcrumbs/breadcrumbs.vue';
import MySnackbars from './components/my/snackbars/snackbars.vue';
import MyPreload from './components/my/extend/my-preloader.vue';
import { sync } from 'vuex-router-sync';

Vue.use(wysiwyg, {}); // config is optional. more below
Vue.use(Vuetify);

const config = {
    locale: 'ru'
};

Validator.addLocale(ru);

const dictionary = {
    ru: {
        messages:{
            required: () => 'Поле обязательно для заполнения'
        }
    }
};

Validator.updateDictionary(dictionary);

Vue.use(VeeValidate, config);
Vue.use(Toasted);


Vue.component('my-tree', MyTree);
Vue.component('my-breadcrumbs', MyBreadcrumbs);
Vue.component('my-snackbars', MySnackbars);
Vue.component('my-preloader', MyPreload);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


const unsync = sync(store, router);

const app = new Vue({
    el: '#app',
    store,
    router,
    template: '<Start/>',
    components: {
        Start
    }
})

