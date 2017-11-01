/**
 * Created by asd on 23.07.2017.
 */
import Vue from 'vue';

var mdMixin = {
    methods:
    {
        showError(text)
        {
            this.$toasted.show(text,{
                containerClass:'my-toast-container',
                type : 'info',
                position: "top-right",
                icon : 'error_outline',
                action : {
                    text : 'Закрыть',
                    onClick : function(e, toastObject)
                    {
                        toastObject.goAway(0);
                    }
                }
            });
            //this.$store.dispatch('Snackbar/addError',text);
        },
        showInfo(text)
        {
            this.$toasted.show(text,{
                containerClass:'my-toast-container',
                type : 'info',
                position: "top-right",
                icon : 'error_outline'
            });
            //this.$store.dispatch('Snackbar/addInfo',text);
        },
    }
};

Vue.mixin(mdMixin);