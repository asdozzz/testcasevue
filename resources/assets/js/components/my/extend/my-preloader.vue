<template>
    <div>
        <transition name="fade" leave-active-class="">
            <div class="text-xs-center" v-show="init">
                <v-progress-circular indeterminate v-bind:size="100" class="blue--text"></v-progress-circular>
            </div>
        </transition>
    </div>
</template>


<script>
    export default
    {
        name   : 'my-preloader',
        props:['init'],
        created: function ()
        {
            console.log('my-preloader');
        },
        data : function ()
        {
            return {};
        },
        methods: {}
    }
</script>