/**
 * Created by asd on 28.03.2018.
 */

var SalestrLangs = {
    'en':{
        'errors':{
            'forms_not_found':'Forms not found',
            'test':function(params)
            {
                return 'test'+params.id;
            }
        },
    }
};

var SalestrText = {
    lang:'en',
    translate:function(alias,obj)
    {
        var parts = alias.split('.');

        var temp = SalestrLangs[this.lang];

        for (var i in parts)
        {
            if (temp[parts[i]] != undefined)
            {
                temp = temp[parts[i]];
            }
            else
            {
                return alias;
            }
        }

        if (typeof temp == 'string')
        {
            return temp;
        }

        if (typeof temp == 'function')
        {
            return temp(obj);
        }

        return alias;
    }
};

module.exports = SalestrText;