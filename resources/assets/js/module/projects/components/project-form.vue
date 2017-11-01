<template>
    <form v-model="valid" ref="form" lazy-validation>
        <v-text-field
                name="title"
                label="Название"
                v-validate="'required'"
                v-model="record.title"
                ></v-text-field>
        <v-text-field
                name="description"
                label="Описание"
                v-model="record.description"
                v-validate="'required'"
                data-vv-name="description"
                multi-line></v-text-field>
        <v-btn @click.native="closeForm()">
            <v-icon dark left>remove_circle</v-icon>
            Закрыть
        </v-btn>
        <v-btn dark class="blue" :disabled="errors.any()" @click.native="saveForm">
            Сохранить
            <v-icon dark right>add_circle</v-icon>
        </v-btn>
    </form>
</template>

<script>
    export default{
        props:['record'],
        name:  'project-form',
        data:function()
        {
            return {valid:true};
        },
        methods: {
            closeForm:function ()
            {
                this.$emit('close_form');
            },
            saveForm:function ()
            {
                var _this = this;
                var promise = this.$store.dispatch('Projects/ProjectsList/Create',_this.record);

                promise.then(
                        function(response)
                        {
                            console.log('Create',response);
                        }
                );

                promise.catch(
                    function(error)
                    {
                        console.log('error',error);
                    }
                );

                _this.$emit('save_form');
            }
        }
    }
</script>