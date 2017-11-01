/**
 * Created by asd on 25.06.2017.
 */
import Requirement from '../models/requirement';

export default {
    namespaced: true,
    state: {
        all:[],
        emulate:[
            new Requirement({ id:1, name: 'My Tree',parent_id:null }),
            new Requirement({ id:2, name: 'hello',parent_id:1  }),
            new Requirement({ id:3, name: 'wat',parent_id:1  }),
            new Requirement({ id:4, name: '234',parent_id:2  })
        ]
    },
    mutations: {
        setProp:function(state, obj)
        {
            state[obj.key] = obj.value;
        },
    },
    actions:
    {
        GetAllByProjectId:function(context,project_id)
        {
            var _this = this;
            return new Promise(
                function(resolve,reject)
                {
                    setTimeout(
                        function()
                        {
                            resolve({data:context.state.emulate});
                        },
                        2000
                    );
                }
            );
        },
        Remove:function(context,id)
        {
            var _this = this;
            return new Promise(
                function(resolve,reject)
                {
                    setTimeout(
                        function()
                        {
                            var removeIndex;
                            for (var i = 0; i < context.state.emulate.length; i++)
                            {
                                if (context.state.emulate[i]['id'] == id)
                                {
                                    removeIndex = i;
                                    break;
                                }
                            }

                            if (removeIndex != undefined)
                            {
                                context.state.emulate.splice(removeIndex,1);
                            }

                            resolve({success:true});
                        },
                        1000
                    );
                }
            );
        },
        Create:function(context,record)
        {
            var _this = this;
            return new Promise(
                function(resolve,reject)
                {

                    setTimeout(
                        function()
                        {
                            record.id= Math.floor(Date.now() / 1000);
                            var requirement = new Requirement(record);
                            context.state.emulate.push(requirement);

                            resolve(requirement);
                        },
                        2000
                    );
                }
            );
        }
    }
};