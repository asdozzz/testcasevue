<template>
    <div>
        <v-card>
            <v-card-text>Главная</v-card-text>
        </v-card>

    </div>
</template>

<style>

</style>

<script>
    export default
    {
        name   : 'home',
        created: function ()
        {
            console.log('home');
            this.$store.commit('Layout/setDefault');
        },
        data   : function ()
        {
            return {};
        },
        methods:{

        }
    }
</script>