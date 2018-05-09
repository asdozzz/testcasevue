/**
 * Created by asd on 28.03.2018.
 */
var SalestrScan = function(el_btn)
{
    this.el_btn = el_btn;
    this.forms = [];

    return this;
};

SalestrScan.prototype.scan = function ()
{
    var _this = this;
    var forms = $('body').find('form:visible');

    if (forms.length == 0)
    {
        return _this.forms;
    }

    forms.each(function(){

        var types = {
            'text'    : $(this).find('input[type="text"]'),
            'password': $(this).find('input[type="password"]'),
            'hidden'  : $(this).find('input[type="hidden"]'),
            'radio'   : $(this).find('input[type="radio"]'),
            'checkbox'   : $(this).find('input[type="checkbox"]'),
            'textarea'   : $(this).find('textarea'),
            'select'   : $(this).find('select'),
        };

        var res = _this.parseForm(types);

        if (res.length > 0)
        {
            _this.forms.push(res);
        }
    });

    return _this.forms;
};

SalestrScan.prototype.parseForm = function (types)
{
    var _this = this;
    var fields = [];

    for (var k in types)
    {
        switch (k)
        {
            case 'text':
            case 'password':
            case 'hidden':
            case 'textarea':
            case 'select':

                for (var i = 0; i < types[k].length; i++)
                {
                    var elem = $(types[k][i]);

                    var id = elem.attr('id');
                    var name = elem.attr('name');

                    var type = '';
                    var selector = '';
                    if (id != undefined && id.length > 0)
                    {
                        type = 'id';
                        selector = id;
                    }

                    if (name != undefined && name.length > 0)
                    {
                        type = 'name';
                        selector = name;
                    }

                    if (type.length == 0)
                    {
                        continue;
                    }

                    fields.push(_this.newField(type,selector,elem.val()));
                }
                break;
        }
    }

    return fields;
};

SalestrScan.prototype.newField = function(type,selector,val)
{
    return {
        'type':type,
        'selector':selector,
        'val':val,
        'delay':0
    }
};

module.exports=SalestrScan;