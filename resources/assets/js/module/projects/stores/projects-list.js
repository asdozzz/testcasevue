/**
 * Created by asd on 25.06.2017.
 */
import Project from '../models/project.js';

export default {
    namespaced: true,
    state: {
        projects:[
            new Project({
                id:1,
                title:'ЭЛТ-ПОИСК #1',
                description:'Динамично развивающаяся компании в сфере web разработки'
            }),
            new Project({
                id:2,
                title:'ЭЛТ-ПОИСК #2',
                description:'Динамично развивающаяся компании в сфере web разработки'
            }),
            new Project({
                id:3,
                title:'ЭЛТ-ПОИСК #3',
                description:'Динамично развивающаяся компании в сфере web разработки'
            })
        ]
    },
    mutations: {
        setProp:function(state, obj)
        {
            state[obj.key] = obj.value;
        },
        remove:function(state,id)
        {
            var rid;
            for (var i = 0; i < state.projects.length; i++)
            {
                if (String(state.projects[i]['id']) == String(id))
                {
                    rid = i;
                    break;
                }
            }

            if (rid != undefined)
            {
                state.projects.splice(rid,1);
            }
        },
        update:function(state,data)
        {
            for (var i = 0; i < state.projects.length; i++)
            {
                if (String(state.projects[i]['id']) == String(data.id))
                {
                    state.projects[i] = data;
                }
            }

            return data;
        },
        create:function(state,data)
        {
            console.log('create',data);
            data.id= Math.floor(Date.now() / 1000);
            state.projects.push(data);

            return data;
        }
    },
    actions: {
        initProjects:function(context)
        {
            var _this = this;
            return new Promise(
                function(resolve,reject)
                {
                    setTimeout(
                        function()
                        {
                            resolve(context.state.projects);
                        },
                        2000
                    );

                }
            );

        },
        Remove:function(context, id)
        {
            var _this = this;
            return new Promise(
                function(resolve,reject)
                {
                    context.commit('remove',id);

                    resolve({'success':1});
                }
            );
        },
        Create:function(context, data)
        {

            var _this = this;
            return new Promise(
                function(resolve,reject)
                {
                    var new_data;
                    if (data.id)
                    {
                        new_data = context.commit('update',data);
                    }
                    else
                    {
                        new_data = context.commit('create',data);
                    }


                    resolve({'data':new_data});
                }
            );
        }
    },
    getters: {  }
};