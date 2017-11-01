/**
 * Created by asd on 22.10.2017.
 */
import aModel from '../../abstract/models/model.js';

export default class Requirement extends aModel
{
    defaults(){
        return {
            id:   null,
            name: '',
            description: '',
            parent_id:null
        }
    }
}