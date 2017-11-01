/**
 * Created by asd on 25.06.2017.
 */
import Projects from './controllers/project';
import ProjectsList from './controllers/projects-list';
import ProjectLayout from './controllers/project-layout';
import ProjectDetail from './controllers/project-detail';
import RequirementsRoutes from '../../module/requirements/routes.js';

export default {
    path: '/projects',
    component:Projects,
    children:[
        {
            path: ':id',
            component:ProjectLayout,
            props: true,
            children:[
                {path: '/',component:ProjectDetail,props: true},
                RequirementsRoutes
            ]
        },
        {
            path: '/',
            component:ProjectsList
        }
    ]
}