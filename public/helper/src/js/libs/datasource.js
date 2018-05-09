/**
 * Created by asd on 28.03.2018.
 */
var SalestrDatasource = function()
{
    var source;
    return this;
};

SalestrDatasource.prototype.save = function(data)
{
    var promise = new Promise(function(success, failure){
        setTimeout(function(){
            var response = {
                'success':true
            };
            success(response);
        },1000);
    });

    return promise;
};

module.exports = SalestrDatasource;