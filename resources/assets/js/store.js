/**
 * Created by asd on 20.06.2017.
 */
import Vue from 'vue'
import Vuex from 'vuex'
import ProjectsStore from "./module/projects/store";
import PlansStore from "./module/plans/store";
import LayoutStore from "./module/layout/store";
import SnackbarStore from "./module/snackbar/store";
import RequirementsStore from "./module/requirements/store";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {    },
    modules:
    {
        Snackbar:SnackbarStore,
        Layout:LayoutStore,
        Projects:ProjectsStore,
        Plans:PlansStore,
        Requirements:RequirementsStore,
    }
});

export default store;