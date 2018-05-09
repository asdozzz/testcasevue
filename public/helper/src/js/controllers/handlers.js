/**
 * Created by asd on 26.04.2018.
 */
var ScanController = require('./scan.js');

var handlers = function(parentContext)
{
    return {
        'scan':function (el)
        {
            parentContext.scaner = new ScanController(el);
            parentContext.scaner.scan();

            parentContext.data.showScaner = true;
            parentContext.methods.draw.scanerForms();
        },
        'scan-back':function(el)
        {
            parentContext.methods.draw.closeScaner();
        },
        'save-form':function(el,event)
        {
            var num = $(el).data('num');

            var data = parentContext.getFormDataByNum(num);

            var errors = parentContext.validationData(data);

            if (errors.length > 0)
            {
                return parentContext.showErrorForForm(num,errors);
            }

            var promise = parentContext.datasource.save(data);

            promise.then(function(response){
                parentContext.methods.draw.closeFormByNum(num,event);
            });

            promise.catch(function(error){

            });
        },
        'close-form':function(el,event)
        {
            var num = $(el).data('num');

            parentContext.methods.draw.closeFormByNum(num,event);
        },
        'remove-item':function(el,event)
        {
            event.stopPropagation();
            var item_num = $(el).data('num');
            var form_num = $(el).parents('.salestr-scaner-form:first').data('num');

            parentContext.scaner.forms[form_num].splice(item_num,1);

            var fieldsHtml = parentContext.methods.draw.scanerSingleForm(form_num);
            $(el).parents('.salestr-scaner-form:first').find('.salestr-scaner-list-fields tbody').html(fieldsHtml);
        },
        'edit-item':function(el)
        {
            var item_num = $(el).data('num');
            var form_num = $(el).parents('.salestr-scaner-form:first').data('num');

            alert('Edit Form#'+form_num+':Item#'+item_num);
        },
        'accept-form':function(el)
        {
            var num = $(el).data('num');

            if (parentContext.data.items[num] != undefined)
            {
                parentContext.data.items[num]['form']();
            }
        }
    }
};

module.exports=handlers;

