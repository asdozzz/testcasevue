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
        name:  'plans',
        created:function()
        {

        }
    }
</script>