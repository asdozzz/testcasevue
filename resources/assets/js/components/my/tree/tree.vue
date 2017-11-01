<template>
    <div class="myTreeUl">
        <ul >
            <my-tree-item v-for="node in treeData" :key="node.id"
                    :model="node"
                    :tree_data="treeData"
                    :select_item="selectItem"
                    :level="1"
                    v-on:add_node="addNode"
                    v-on:remove_node="removeNode"
                    v-on:select="select">

            </my-tree-item>
        </ul>
    </div>
</template>

<style>
    .myTreeUl ul
    {
        padding-left: 28px;
        list-style-type: none;
    }

    .myTreeUl ul:first-child
    {
        padding-left: 0px;
    }

    .myTreeUl li
    {
        cursor: pointer;
        text-align: left;
    }

    .myTreeUl li .active
    {
        background: #efefef;
    }

    .bold
    {
        font-weight: bold;
    }


</style>

<script>
    import TreeItem from './tree-item.vue';

    export default
    {
        props:['tree_data'],
        components:{ 'my-tree-item':TreeItem },
        name   : 'my-tree',
        created: function ()
        {
        },
        data   : function ()
        {
            return {
                counter:0,
                selectItem:undefined,
                treeData:this.tree_data
            };
        },
        watch:{
            tree_data:function(newVal)
            {
                this.treeData = newVal;
            }
        },
        methods:
        {
            select:function(model)
            {
                if (this.selectItem && String(this.selectItem.id) == String(model.id))
                {
                    this.selectItem = undefined;
                }
                else
                {
                    this.selectItem = model;
                }

                this.$emit('select_item',this.selectItem);
            },
            addNode:function()
            {
                var _this = this;
                _this.counter++;
                this.$emit('add_node');

            },
            removeNode:function()
            {
                var _this = this;
                _this.counter++;
                this.$emit('remove_node');
            }
        }
    }
</script>