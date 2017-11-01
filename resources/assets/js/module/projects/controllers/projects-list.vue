<template>
    <div>
        <transition name="fade" leave-active-class="">
        <div v-show="!preloadFetch">
            <h5 title style="line-height: none">
                Проекты
                <v-fab-transition>
                    <v-btn small primary fab dark class="blue--text fab30" v-show="!showForm" @click.native.stop="openAddForm" style="margin: auto">
                        <v-icon>add</v-icon>
                    </v-btn>
                </v-fab-transition>
            </h5>

            <v-card v-if="showForm">
                <v-card-title>
                    <div v-if="!selectProject.id">Добавить проект</div>
                    <div v-if="selectProject.id">Редактировать проект</div>
                </v-card-title>
                <v-card-text>
                    <project-form :record="selectProject" v-on:close_form="closeForm" v-on:save_form="saveForm"></project-form>
                </v-card-text>
            </v-card>
            <v-layout v-show="!showForm">
                <transition-group name="list-complete">
                    <v-card v-for="item in items" class="list-complete-item" style="margin:0 10px 10px 0;width: 330px" v-bind:key="item.id">
                        <v-card-title >
                            <div class="headline" style="width: 100%;">
                                <router-link class="blue--text" :to="'/projects/'+item.id">{{item.title}}</router-link>
                            </div>
                            <div>
                                {{item.description}}
                            </div>
                        </v-card-title>

                        <v-card-actions>
                            <v-btn outline fab small class="fab30 blue--text" @click.native.stop="removeItem(item)">
                                <v-icon>delete</v-icon>
                            </v-btn>
                            <v-btn outline fab small class="fab30 blue--text" @click.native.stop="openEditForm(item)">
                                <v-icon>edit</v-icon>
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </transition-group>
            </v-layout>

            <v-dialog v-model="removeConfirm" width="600">
                <v-card>
                    <v-card-title class="headline">{{confirm.title}}</v-card-title>
                    <v-card-text>{{confirm.contentHtml}}</v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn class="green--text darken-1" flat="flat" @click.native="removeConfirm = false">{{confirm.cancel}}</v-btn>
                        <v-btn class="green--text darken-1" flat="flat" @click.native="resultConfirm('ok')">{{confirm.ok}}</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </div>
        </transition>
        <my-preloader :init="preloadFetch"></my-preloader>
    </div>

</template>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .3s ease;
    }
    .fade-enter, .fade-leave-to{
        opacity: 0
    }

    .list-complete-item {
        transition: all 1s;
        display: inline-block;
        margin-right: 10px;
    }
    .list-complete-enter, .list-complete-leave-to
        /* .list-complete-leave-active до версии 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
    .list-complete-leave-active {
        position: absolute;
    }
</style>

<script>
    import ProjectForm from '../components/project-form.vue';

    export default{
        name:  'projects-list',
        components:{ProjectForm},
        data:function()
        {
            return {
                preloadFetch:false,
                items:[],
                removeConfirm:false,
                confirm: {
                    title: 'Вы уверены, что хотите удалить проект?',
                    contentHtml: 'Все данные проекта будут безвозвратно удалены.',
                    ok: 'Да',
                    cancel: 'Отмена'
                },
                removeId:undefined,
                showForm:false,
                selectProject:undefined
            }
        },
        created:function()
        {
            var _this = this;

            _this.setProjectModel();

            _this.$store.commit('Layout/setDefault');

            _this.fetchProjects();

            var text = 'Непредвиденная ошибка, пжста обратитесь в службу техподдержки';

            setTimeout(function(){_this.showError(text)},2000);

        },

        methods: {
            fetchProjects:function()
            {
                var _this = this;
                _this.preloadFetch = true;
                var  promise = this.$store.dispatch('Projects/ProjectsList/initProjects');

                promise.then(
                    function(response)
                    {
                        _this.preloadFetch = false;
                        _this.items = response;
                    }
                );
            },
            resultConfirm(type)
            {
                this.removeConfirm = false;

                if (type == 'ok')
                {
                    this.$store.dispatch('Projects/ProjectsList/Remove',this.removeId);
                }
            },
            setProjectModel:function(project)
            {
                this.selectProject = {
                    id:'',
                    title:'',
                    description:''
                };

                if (project != undefined)
                {
                    for (var key in project)
                    {
                        this.selectProject[key] = project[key];
                    }
                }
            },
            closeForm:function()
            {
                console.log('asd2');
                this.showForm = false;
            },
            saveForm:function()
            {
                this.showForm = false;
            },
            openAddForm:function()
            {
                this.setProjectModel();
                this.showForm = true;
            },
            openEditForm:function(project)
            {
                this.setProjectModel(project);
                this.showForm = true;
            },
            removeItem:function(item)
            {
                this.removeId = item.id;
                this.removeConfirm = true;
            },
            toggleLeftSidenav()
            {
                this.$refs.leftSidenav.toggle();
            },
            toggleAddProjectSidenav()
            {
                this.$refs.AddProjectSidenav.toggle();
            },
            closeRightSidenav()
            {
                this.$refs.rightSidenav2.close();
            },
            openAddProject(ref)
            {
                console.log('Opened: ' + ref);
            },
            closeAddProject(ref)
            {
                console.log('Closed: ' + ref);
            }
        }
    }
</script>

