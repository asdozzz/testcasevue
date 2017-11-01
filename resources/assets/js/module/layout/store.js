/**
 * Created by asd on 12.10.2017.
 */
export  default {
    namespaced: true,
    state:
    {
        default:{
            color:'blue',
            title:'Testcase',
            sidebar:{
                items:[
                    {icon:'home',route:'/', label:'Главная'},
                    {icon:'settings',route:'/projects', label:'Проекты'}
                ]
            },
            breadcrumbs:[
                {
                    'link':'/',
                    'name':'Главная'
                }
            ]
        },
        color:'blue',
        title:'Testcase',
        sidebar:{
            items:[]
        },
        breadcrumbs:[]
    },
    mutations:{
        setProp:function(state, obj)
        {
            console.log('Layout.setProp',obj);
            state[obj.key] = obj.value;
        },
        getProp:function(state, key)
        {
            return state[key];
        },
        setDefault:function(state)
        {

            for (var key in state.default)
            {
                console.log('Layout.setDefault_'+key, state.default[key]);
                state[key] = state.default[key];
            }

        },
        setBreadcrumbs:function(state, obj)
        {
            state.breadcrumbs = [];

            for (var i = 0; i < state.default.breadcrumbs.length; i++)
            {
                state.breadcrumbs.push(state.default.breadcrumbs[i]);
            }

            for (var i = 0; i < obj.arr.length; i++)
            {
                state.breadcrumbs.push(obj.arr[i]);
            }

            console.log('Layout.setBreadcrumbs',state.breadcrumbs);
        },
        addBreadcrumb:function(state, obj)
        {
            state.breadcrumbs.push(obj);

            console.log('Layout.addBreadcrumb',obj);
        }
    }
};