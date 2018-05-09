/**
 * Created by asd on 26.04.2018.
 */
var compile = function(parentContext)
{
    return {
        'All':function()
        {
            parentContext.compile.items = [];

            for (var i = 0; i < parentContext.data.items.length; i++)
            {
                var item = parentContext.data.items[i];
                var is_draw = item.observer();
                if (!is_draw) continue;

                parentContext.compile.items.push(item);
            }

            return true;
        }
    };
}

module.exports=compile;