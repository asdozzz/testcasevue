<template>
    <div>
        <v-container grid-list-md text-xs-center>
            <v-layout row warp>
                <v-flex md12>
                    <v-card class="pa-1">
                        <v-card-text>Карточка проекта</v-card-text>
                    </v-card>
                </v-flex>
            </v-layout>

        </v-container>


    </div>

</template>

<script>
    export default
    {
        name   : 'project-detail',
        props:['id'],
        created: function ()
        {
            var _this = this;
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
        data: function ()
        {
            return {};
        },
        methods:
        {

        }
    }
</script>