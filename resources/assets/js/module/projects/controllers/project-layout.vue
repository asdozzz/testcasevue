<template>
    <div>
        <transition name="fade" leave-active-class="">
            <router-view></router-view>
        </transition>
    </div>
</template>

<style>

</style>

<script>
    export default
    {
        name   : 'project-layout',
        props:['id'],
        created: function ()
        {
            var _this = this;

            var promise = _this.$store.dispatch('Projects/ProjectDetail/getById',_this.id);

            promise.then(
                function(response)
                {
                    _this.setLayoutSettings(response);
                    console.log('response',response);
                }
            ).catch(
                function(error)
                {
                    console.log('eror',error);
                }
            );
        },
        computed:{
            project:function()
            {
                return this.$store.state.Projects.ProjectDetail.project;
            },
            route:function()
            {
                return this.$store.state.route;
            }
        },
        methods: {
            setLayoutSettings:function(response)
            {
                var _this = this;

                var items = [
                    {icon:'home',route:'/', label:'Главная'},
                    {icon:'view_module',route:'/projects', label:'Все проекты'},
                    {icon:'assignment',route:'/projects/'+_this.id+'/requirements', label:'Требования'},
                    {icon:'reorder',route:'/projects/'+_this.id+'/tests', label:'Тесты'},
                    {icon:'assignment_turned_in',route:'/projects/'+_this.id+'/runs', label:'Прогоны'},
                    {icon:'settings',route:'/projects/'+_this.id+'/settings', label:'Настройки'},
                ];

                _this.$store.commit('Layout/setProp',{key:'sidebar',value:{items:items}});
                _this.$store.commit('Layout/setProp',{key:'color',value:'red'});
                _this.$store.commit('Layout/setProp',{key:'title',value:response.title});

                _this.$store.commit('Layout/addBreadcrumb',{
                    'link':_this.route.path,
                    'name':response.title
                });
            }
        }
    }
</script>