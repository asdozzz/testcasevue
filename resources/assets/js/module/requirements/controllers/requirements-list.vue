<template>
    <div>
        <transition name="fade" mode="out-in">
            <v-container grid-list-md text-xs-center v-if="!preloadFetch">
                <v-layout row warp>
                    <v-flex md3 class="pa-1">
                        <v-card>
                            <v-toolbar class="blue" dark>
                                <v-toolbar-title>Все требования</v-toolbar-title>
                            </v-toolbar>
                            <v-progress-linear class="my-progress-linear" v-bind:indeterminate="true" v-show="runRemove"></v-progress-linear>
                            <v-card-text>
                                <div v-if="tree_data.length > 0" :class="{opacity2:runRemove}">
                                    <my-tree
                                            :tree_data="tree_data"
                                            v-on:add_node="openCreateForm"
                                            v-on:remove_node="removeNode"
                                            v-on:select_item="selectEvent">
                                    </my-tree>
                                </div>
                                <div v-else>
                                    <v-btn primary @click.stop="openCreateForm">
                                        <v-icon left>add_circle_outline</v-icon>
                                        Добавить
                                    </v-btn>
                                </div>

                            </v-card-text>
                        </v-card>
                    </v-flex>
                    <transition name="fade" mode="out-in">
                        <v-flex d-flex md9 class="pa-1" v-if="!showCreateForm" key="view">
                            <v-card  v-if="selectItem">
                                <v-toolbar class="blue" dark>
                                    <v-toolbar-title>{{selectItem.name}}</v-toolbar-title>
                                </v-toolbar>
                                <v-card-text>
                                    <div v-html="selectItem.description">
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-flex>
                        <v-flex d-flex md9 class="pa-1" v-else="showCreateForm" key="form">

                                    <requirement-create-form v-if="selectItem"
                                            :parent_id="selectItem.id"
                                            v-on:close_form="showCreateForm=false"
                                            v-on:save_form="saveCreateForm"
                                    ></requirement-create-form>

                        </v-flex>
                    </transition>
                </v-layout>
            </v-container>
            <my-preloader v-else :init="preloadFetch"></my-preloader>
        </transition>

    </div>

</template>

<style>

</style>

<script>
    import RequirementCreateForm from '../components/requirement-create-form.vue';

    export default
    {
        name   : 'requirements-list',
        components:{RequirementCreateForm},
        created: function ()
        {
            var _this = this;

            _this.setLayoutSettings();

            _this.fetchRequirements();
        },
        computed:{
            tree_data:function()
            {
                var _this = this;
                var arr  = _this.generateFormatData(_this.original_data);

                return arr;
            },
            project:function()
            {
                return this.$store.state.Projects.ProjectDetail.project;
            },
            route:function()
            {
                return this.$store.state.route;
            },
            showForm:function()
            {
                return this.showCreateForm || this.showEditForm;
            }
        },
        data: function ()
        {
            return {
                preloadFetch:false,
                original_data:[],
                selectItem:undefined,
                showCreateForm:false,
                showEditForm:false,
                runRemove:false,
                ess:''
            };
        },
        methods: {
            list_to_tree:function()
            {
                var list = this.original_data;
                var map = {}, node, roots = [], i;

                for (i = 0; i < list.length; i += 1)
                {
                    map[list[i].id] = i;

                    this.$set(list[i],'children',[]);
                }

                for (i = 0; i < list.length; i += 1)
                {
                    node = list[i];

                    if (node == undefined) continue;

                    if (node.parent_id)
                    {
                        if (map[node.parent_id] == undefined) continue;

                        if (typeof list[map[node.parent_id]].children == undefined)
                        {
                            this.$set(list[map[node.parent_id]],'children',[]);
                        }
                        // if you have dangling branches check that map[node.parent_id] exists
                        list[map[node.parent_id]].children.push(node);
                    }
                    else
                    {
                        node.parent_id = 0;
                        roots.push(node);
                    }
                }

                return roots;
            },
            generateFormatData:function(tree_data)
            {
                var _this = this;

                return _this.list_to_tree();
            },
            fetchRequirements:function()
            {
                var _this = this;
                _this.preloadFetch = true;
                var request = _this.$store.dispatch('Requirements/RequirementsList/GetAllByProjectId', _this.route.id);

                request.then(
                    function(response)
                    {
                        _this.preloadFetch = false;
                        _this.original_data = response.data;
                    }
                );

                request.catch(
                    function(error)
                    {
                        _this.preloadFetch = false;
                        _this.showError(error);
                    }
                );
            },
            setLayoutSettings:function()
            {
                var _this = this;
                _this.$store.commit('Layout/addBreadcrumb',{
                    'link':_this.route.path,
                    'name':'Требования'
                });
            },
            selectEvent:function(node)
            {
                this.selectItem = node;
            },
            removeNode:function()
            {
                var _this = this;
                _this.runRemove = true;
                var request = _this.$store.dispatch('Requirements/RequirementsList/Remove', _this.selectItem.id);

                request.then(
                    function(response)
                    {
                        //_this.fetchRequirements();
                        _this.selectItem = undefined;
                        _this.runRemove = false;
                    }
                );

                request.catch(
                    function(error)
                    {
                        _this.showError(error);
                        _this.runRemove = false;
                    }
                );
            },
            openCreateForm:function()
            {
                var _this = this;
                _this.showCreateForm = !_this.showCreateForm;
            },
            saveCreateForm:function(record)
            {
                var _this = this;

                _this.showCreateForm = false;
                //_this.
            }
        }
    }
</script>