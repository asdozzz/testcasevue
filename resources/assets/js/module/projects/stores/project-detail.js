/**
 * Created by asd on 13.08.2017.
 */
export default {
    namespaced: true,
    state     : {
        project: {}
    },
    mutations : {
        setProp: function (state, obj)
        {
            state[obj['key']] = obj['value'];
        }
    },
    actions   : {
        getById: function (context, id)
        {
            return new Promise(function (succeed, fail)
                {
                    var promise = context.dispatch('Projects/ProjectsList/initProjects',null,{root:true});

                    promise.then(
                        function(projects)
                        {
                            var project;
                            for (var i = 0; i < projects.length; i++)
                            {
                                if (projects[i]['id'] == id)
                                {
                                    project = projects[i];
                                }
                            }
                            console.log('project',project);
                            context.commit('setProp',{key:'project',value:project});

                            succeed(project);
                        }
                    ).catch(
                        function(error)
                        {
                            console.log('getById_error',error);
                        }
                    );
                }
            );
        }
    }
};
