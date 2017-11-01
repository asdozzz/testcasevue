/**
 * Created by asd on 19.10.2017.
 */
export  default {
    namespaced: true,
    state:
    {
        items:[
        ],
    },
    mutations:{
        setProp:function(state, obj)
        {
            console.log('Snackbars.setProp',obj);
            state[obj.key] = obj.value;
        },
        getProp:function(state, key)
        {
            return state[key];
        },
        add:function(state, obj)
        {
            obj.show = true;
            state.items.push(obj);

            console.log('Snackbars.add',obj);
        },

    },
    actions:
    {
        addError:function(context, text)
        {
            var obj = {
                'text':text,
                'type':'error'
            };

            context.commit('add',obj);
        },
        addInfo:function(context, text)
        {
            var obj = {
                'text':text,
                'type':'info'
            };

            context.commit('add',obj);
        },
    }
};