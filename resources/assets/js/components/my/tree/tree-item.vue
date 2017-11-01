<template>
    <li>
        <div :class="{bold: isFolder,active:activeItem}" style="position: relative">
            <span v-if="isFolder" @click="toggle" class="left">
                <v-icon>{{open?'keyboard_arrow_down':'keyboard_arrow_right'}}</v-icon>
            </span>

            <div @click="selectItem(itemModel)">
                <v-icon v-if="isFolder" class="amber--text">folder</v-icon>
                <v-icon v-if="!isFolder" class="blue--text text--darken-2">description</v-icon>
                {{itemModel.name}}
            </div>

            <span v-if="activeItem" style="position: absolute;right: 0px;top: 0px">
                <v-icon class="blue--text text--darken-2" @click.stop="addNode()">add_circle_outline</v-icon>
                <v-icon class="blue--text text--darken-2" @click.stop="removeNode()">remove_circle_outline</v-icon>
            </span>
        </div>
        <transition name="fade" leave-active-class="">
            <ul class="subTree" v-show="open" v-if="isFolder">
                <my-tree-item
                        v-on:select="selectItem"
                        v-on:add_node="addNode"
                        v-on:remove_node="removeNode"
                        v-for="(node,i) in itemModel.children"
                        :level="level+1"
                        :tree_data="treeData"
                        :select_item="select_item"
                        :model="node" :key="node.id">
                </my-tree-item>
            </ul>
        </transition>
    </li>

</template>

<style>

</style>

<script>
    export default
    {
        name   : 'my-tree-item',
        props: {
            model: Object,
            select_item:undefined,
            tree_data:Array,
            level:Number
        },
        data: function ()
        {
            return{
                open:false,
                itemModel:this.model,
                treeData:this.tree_data
            }
        },
        watch:{
            tree_data:function(newVal)
            {
                console.log('treeData_'+this.level,newVal);
                this.treeData = newVal;
            },
            model:function(newVal)
            {
                this.itemModel = newVal;
            }
        },
        computed:
        {
            activeItem:function()
            {
                return this.select_item && this.itemModel.id==this.select_item.id;
            },
            isFolder: function ()
            {
                return this.itemModel.children && this.itemModel.children.length;
            }
        },
        methods:
        {
            toggle: function ()
            {
                var _this = this;
                if (_this.isFolder)
                {
                    _this.open = !_this.open
                }

                _this.$emit('menu_toggle', _this.itemModel);
            },
            selectItem:function(model)
            {
                var _this = this;
                _this.$emit('select', model);
            },
            menu_toggle:function(model)
            {
                var _this = this;
                _this.$emit('menu_toggle', model);
            },
            addNode:function()
            {
                var _this = this;
                _this.$emit('add_node');
            },
            removeNode:function()
            {
                var _this = this;
                _this.$emit('remove_node');
            }
        }
    }
</script>