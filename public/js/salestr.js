/**
 * Created by asd on 29.03.2018.
 */
document.addEventListener('DOMContentLoaded',
    function ()
    {
        var items = [
            {
                name:'Test',
                label:'Тестовая 1',
                observer:function()
                {
                    return window.test == 1 || window.test > 10;
                },
                form:function ()
                {
                    alert(1);
                }
            },
            {
                name:'test2',
                label:'Тестовая 2',
                observer:function()
                {
                    return window.test == 2 || window.test > 10;
                },
                form:function ()
                {
                    alert(2);
                }
            }
        ];
        window.Salestr.addItems(items);
        window.Salestr.run();
    }
);