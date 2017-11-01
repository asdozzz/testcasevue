/**
 * Created by asd on 22.10.2017.
 */
export default class aModel
{
    defaults()
    {
        return {};
    }

    constructor(obj)
    {
        var def = this.defaults();

        for (var key in def)
        {
            this[key] = def[key];
        }

        for (var key in obj)
        {
            this[key] = obj[key];
        }
    }
}