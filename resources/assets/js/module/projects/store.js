/**
 * Created by asd on 20.06.2017.
 */
import ProjectsListStore from './stores/projects-list';
import ProjectDetailStore from './stores/project-detail';

export default {
    namespaced: true,
    state: {    },
    modules:
    {
        ProjectsList:ProjectsListStore,
        ProjectDetail:ProjectDetailStore
    }
};