/**
 * Created by asd on 25.06.2017.
 */
import Plans from './controllers/plans';
import PlansList from './controllers/plans-list';

const PlansRoutes = {
    path: '/plans',
    component:Plans,
    children:[
        {path: '/',component:PlansList}
    ]
}