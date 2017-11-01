<template>
    <div>
        <v-snackbar
                v-for="(snack,i) in snackbar.items" :key="i"
                :success="snack.type === 'success'"
                :info="snack.type === 'info'"
                :warning="snack.type === 'warning'"
                :error="snack.type === 'error'"
                :primary="snack.type === 'primary'"
                :secondary="snack.type === 'secondary'"
                :multi-line="true"
                :top="true"
                :right="true"
                v-model="snack.show"
        >
            {{snack.text}}
            <v-btn icon class="white--text" @click.native="snack.show = false">
                <v-icon>close</v-icon>
            </v-btn>
        </v-snackbar>
    </div>
</template>

<style>

</style>

<script>
    export default
    {
        name   : 'my-snackbars',
        created: function ()
        {
            console.log('');
        },
        data   : function ()
        {
            return {
                timeout:5000,
                show:true
            };
        },
        computed:
        {
            snackbar:function()
            {
                return this.$store.state.Snackbar;
            }
        },
        methods: {}
    }
</script>