<template>
    <div>
        <transition name="fade"
                    leave-active-class="">
            <router-view></router-view>
        </transition>
    </div>

</template>

<script>
    export default
    {
        name:  'projects',
        created:function()
        {
            var _this = this;

            _this.$store.commit('Layout/addBreadcrumb',{
                'link':'/projects',
                'name':'Проекты'
            });
        }
    }
</script>

