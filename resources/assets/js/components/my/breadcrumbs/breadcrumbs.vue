<template>
    <div class="card" v-if="items.length">
        <transition-group name="fade" leave-active-class="" tag="ul" class="breadcrumbs breadcrumbs--with-icons">
            <li data-divider="chevron_right" v-for="(item,key) in items" :key="key"><router-link class="breadcrumbs__item"  :to="item.link" >{{ item.name}}</router-link></li>
        </transition-group>
    </div>
</template>

<style>

</style>

<script>
    export default
    {
        name   : 'my-breadcrumbs',
        props:['items'],
        created: function ()
        {
            console.log('my-breadcrumbs');
        },
        data   : function ()
        {
            return {};
        },
        methods: {}
    }
</script>