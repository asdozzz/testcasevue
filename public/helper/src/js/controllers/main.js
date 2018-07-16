import _ from 'lodash';
var SalestrText = require('../libs/langs.js');
var SalestrDatasource = require('../libs/datasource.js');

var DrawMethods = require('../controllers/methods/draw.js');
var CompileMethods = require('../controllers/methods/compile.js');
var Handlers = require('../controllers/handlers.js');
var Binds = require('../controllers/binds.js');

var Salestr = function(options)
{
    var helper = this;

    helper.SalestrText = SalestrText;

    helper.baseUrl = 'http://salestr.ru/';
    helper.templates = {};
    helper.compiles = {};
    helper.scaner = {};
    helper.datasource = new SalestrDatasource();

    helper.types = [
        {'id':'id','text':'id'},
        {'id':'name','text':'name'}
    ];

    helper.data = {
        items:[],
        showScaner:false
    };

    helper.compile = {
        items:[],
    };

    helper.methods = {
        'draw':new DrawMethods(helper),
        'compile':new CompileMethods(helper),
    };

    helper.handlers = new Handlers(helper);

    helper.options = {};
    helper.init(options);

    return helper;
};

Salestr.prototype.getFormDataByNum = function(num)
{
    var _this = this;

    var form = $('.salestr-scaner-form[data-num="'+num+'"]');

    var data = {
        'name':form.find('[name="name_'+num+'"]').val().trim(),
        'type':form.find('[name="type_'+num+'"]').val(),
        'fields':[]
    };

    form.find('.salestr-form-item').each(function (index)
    {
        var item = $(this);
        var i = item.attr('data-num');

        var fields = {
            'type':item.find('[name="type_'+i+'"]').val(),
            'selector':item.find('[name="selector_'+i+'"]').val(),
            'val':item.find('[name="val_'+i+'"]').val().trim(),
            'delay':item.find('[name="delay_'+i+'"]').val()
        };

        data.fields.push(fields);
    });

    return data;
};

Salestr.prototype.validationData = function(data)
{
    var _this = this;

    var errors = [];

    if (data.name.length == 0)
    {
        errors.push(_this.newError('name','required',data));
    }

    if (data.fields.length == 0)
    {
        errors.push(_this.newError('fields','fields.required',data));
    }

    return errors;
};

Salestr.prototype.newError = function(field,rule,data)
{
    var _this = this;

    return {
        'name':field,
        'error':SalestrText.translate('validation.'+rule,{field:field,data:data})
    }
};

Salestr.prototype.showErrorForForm = function(num,errors)
{
    var _this = this;

    var form = $('.salestr-scaner-form[data-num="'+num+'"]');

    form.find('.salestr-is-invalid').removeClass('salestr-is-invalid');
    form.find('.salestr-invalid-feedback').removeClass('salestr-invalid-feedback');
    form.find('.salestr-form-error').html('');

    for (var i = 0; i < errors.length; i++)
    {
        var obj = errors[i];

        switch (obj.name)
        {
            case 'fields':
                form.find('.salestr-form-error').html(obj.error);
                break;

            default:
                form.find('[name="'+obj.name+'_'+num+'"]').addClass('salestr-is-invalid');
                var helper = form.find('[name="'+obj.name+'_'+num+'"]').parent().find('.salestr-form-text');
                helper.addClass('salestr-invalid-feedback');
                helper.html(obj.error);
                break;
        }
    }
};

Salestr.prototype.log = function(mess,data)
{
    var _this = this;
    console.log(mess,data);
};

Salestr.prototype.route = function(uri)
{
    var _this = this;
    return _this.baseUrl+uri;
};

Salestr.prototype.init = function(options)
{
    //this.run();
};

Salestr.prototype.showPanel = function(options)
{
    var helper = this;
    helper.methods.draw['ListItems']();
    $('.salestr-main-button').hide(200,function ()
    {
        $('.salestr-main-panel').show(200);
    });
};

Salestr.prototype.showButton = function(options)
{
    $('.salestr-main-button').show(200);
    $('.salestr-main-panel').hide(200);
};

Salestr.prototype.binds = function(options)
{
    var helper = this;

    var binds = new Binds(helper);
    binds.listen();

};

Salestr.prototype.my_template = function(name,data)
{
    var helper = this;

    if (!helper.compiles[name])
    {
        helper.compiles[name] = _.template(helper.templates[name]);
    }

    return helper.compiles[name](data);
};

Salestr.prototype.validationItem = function(item)
{
    var err;
    if (item.name == undefined)
    {
        err = {index:i,msg:'Property @name@ not found'};
        return err;
    }

    if (item.label == undefined)
    {
        err = {index:i,msg:'Property @label@ not found'};
        return err;
    }

    if (item.observer == undefined)
    {
        err = {index:i,msg:'Property @observer@ not found'};
        return err;
    }

    if (typeof item.observer != 'function')
    {
        err = {index:i,msg:'Property @observer@ is not function'};
        return err;
    }

    if (item.form == undefined)
    {
        err = {index:i,msg:'Property @form@ not found'};
        return err;
    }

    if (typeof item.form != 'function')
    {
        err = {index:i,msg:'Property @form@ is not function'};
        return err;
    }

    return err;
}

Salestr.prototype.addItems = function(items)
{
    var helper = this;
    var errs = [];
    for (var i = 0; i < items.length; i++)
    {
        var item =  items[i];

        var err = helper.validationItem(item);

        if (err)
        {
            errs.push(err);
            continue;
        }

        helper.data.items.push(item);
    }

    if (errs.length > 0)
    {
        console.error('SALESTR ERROR ADD ITEMS',errs);
        return false;
    }

    return true;
};

Salestr.prototype.run = function(options)
{
    var helper = this;
    helper.binds();

    var req = $.ajax(
        {
            url:helper.route('helper/templates'),
            dataType:'json'
        }
    );

    req.done(function(result){
        helper.templates = result;
        helper.methods.draw.all();
    });

};

export default Salestr;