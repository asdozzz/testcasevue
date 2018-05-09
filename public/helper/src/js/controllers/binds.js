/**
 * Created by asd on 26.04.2018.
 */
var binds = function(parentContext)
{
    var self = this;
    self.parentContext = parentContext;
    return self;
};

binds.prototype.listen = function()
{
    var self = this;

    $(document).on('click',
        function(e)
        {
            var el = e.target;
            var closest = $(el).closest('.salestr-main-panel');

            if (closest.length == 0 && $('.salestr-main-panel').css('display') != 'none')
            {
                self.parentContext.showButton();
            }
        }
    );

    $(document).on('mouseover','.salestr-main-button',
        function()
        {
            self.parentContext.showPanel();
        }
    );

    $(document).on('click','[data-action]',
        function(e)
        {
            var action = $(this).data('action');
            console.log('data-action',action);

            if (self.parentContext.handlers[action] != undefined)
            {
                self.parentContext.log('salestr-action',action);
                self.parentContext.handlers[action](this,e);
            }
        }
    );

    setInterval(function ()
    {
        self.parentContext.methods.compile.All();
        self.parentContext.methods.draw.changeData();
    },1000);
};

module.exports=binds;