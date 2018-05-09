/**
 * Created by asd on 26.04.2018.
 */
var methods = function(parentContext)
{
    return {
        all:function()
        {
            parentContext.methods.draw.drawButton();
            parentContext.methods.draw.drawPanel();
        },
        'drawButton':function()
        {
            var button = parentContext.my_template('main-button',{});
            $('body').append(button);
        },
        'drawPanel':function()
        {
            var button = parentContext.my_template('main-panel',{});
            $('body').append(button);
        },
        'scanerSingleForm':function(i)
        {
            var fields = parentContext.scaner.forms[i];
            var fieldsHtml = '';

            for (var j = 0; j < fields.length; j++)
            {
                fieldsHtml+= parentContext.my_template('scaner-form-line',{num:j,types:parentContext.types,record:fields[j]});
            }

            return fieldsHtml;
        },
        'scanerForms':function ()
        {
            var formsHtml = '';

            for (var i = 0; i < parentContext.scaner.forms.length; i++)
            {
                var fieldsHtml = parentContext.methods.draw.scanerSingleForm(i);

                var record = {
                    id:null,
                    name:null,
                    domain:location.origin+location.pathname
                };

                formsHtml += parentContext.my_template('scaner-form-wrapper',{num:i,fields:fieldsHtml,record:record});
            }

            if (formsHtml.length == 0)
            {
                formsHtml += parentContext.my_template('scaner-form-empty',{text:parentContext.SalestrText.translate('errors.forms_not_found')});
            }

            $('.salestr-scaner-forms-container').html(formsHtml);

            parentContext.methods.draw.changePanelData();
        },
        changePanelData:function()
        {
            if (parentContext.data.showScaner)
            {
                $('.salestr-scan').hide(200);
                $('.salestr-scan-back').show(300);
                $('.salestr-local-forms-container').hide(200);
                $('.salestr-scaner-forms-container').show(300);
            }
            else
            {
                $('.salestr-scan-back').hide(200);
                $('.salestr-scan').show(300);
                $('.salestr-scaner-forms-container').hide(200);
                $('.salestr-local-forms-container').show(300);
            }
        },
        'closeScaner':function()
        {
            parentContext.methods.draw.ListItems();
            parentContext.methods.draw.changePanelData();
        },
        'closeFormByNum':function(num,event)
        {
            event.stopPropagation();
            var form = $('.salestr-scaner-form[data-num="'+num+'"]');
            form.hide(0);

            var forms =  $('.salestr-scaner-form:visible');

            if (forms.length <= 0)
            {
                parentContext.methods.draw.closeScaner();
            }
        },
        'ListItems':function ()
        {
            var html = '';
            var itemsHtml = '';
            var items = parentContext.compile.items;

            for (var i = 0; i < items.length; i++)
            {
                var item = items[i];

                itemsHtml += parentContext.my_template('list-local-forms-item',{index:i,item:item});
            }

            html = parentContext.my_template('list-local-forms',{items:itemsHtml});

            $('.salestr-local-forms-container').html(html);

            parentContext.methods.draw.changePanelData();
        },
        changeData:function()
        {
            parentContext.methods.draw.ListItems();
            parentContext.methods.draw.changePanelData();
        }
    };
};

module.exports=methods;