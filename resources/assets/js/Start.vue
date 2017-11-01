<template>
    <div>
        <v-app toolbar footer>

            <v-navigation-drawer persistent absolute light v-model="drawer">
                <v-toolbar flat class="transparent">
                    <v-list class="pa-0">
                        <v-list-tile avatar>
                            <v-list-tile-avatar>
                                <img src="https://randomuser.me/api/portraits/men/85.jpg" />
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title>John Leider</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>

                </v-toolbar>

                <v-list dense class="pt-0" v-if="laydata.sidebar">
                    <v-divider></v-divider>
                    <v-list-tile ripple class="list__tile--link" v-for="item in laydata.sidebar.items" :key="item.route">
                        <v-list-tile-action>
                            <v-icon>{{item.icon}}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <router-link tag="v-list-tile-title" :to="item.route">{{item.label}}</router-link>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-navigation-drawer>
            <v-toolbar v-bind:class="laydata.color" fixed dark>
                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                <v-toolbar-title>{{laydata.title}}</v-toolbar-title>

                <my-breadcrumbs v-if="laydata.breadcrumbs && false" :items="laydata.breadcrumbs"></my-breadcrumbs>
            </v-toolbar>
            <main>
                <my-snackbars></my-snackbars>

                <v-container fluid>
                    <transition name="fade"
                                leave-active-class="">
                        <router-view></router-view>
                    </transition>
                </v-container>
            </main>

        </v-app>

    </div>
</template>

<style lang="scss">
    @import 'assets/main.scss';
    @import 'assets/ext-animate.scss';
</style>

<script>

    export default {
        name   : 'start',
        data () {
            return {
                drawer: true,
                mini:false
            }
        },
        computed:
        {
            laydata:function()
            {
                return this.$store.state.Layout;
            }
        },
        created:function()
        {
            this.$store.commit('Layout/setDefault');
        },
        methods: {
            toggleLeftSidenav()
            {
                this.$refs.leftSidenav.toggle();
            },
            closeLeftSidenav()
            {
                this.$refs.leftSidenav.close();
            },
            open(ref)
            {
                console.log('Opened: ' + ref);
            },
            close(ref)
            {
                console.log('Closed: ' + ref);
            }
        }
    }
</script>

<style>
    .content-wrapper {
        padding: 20px;
    }
</style>
