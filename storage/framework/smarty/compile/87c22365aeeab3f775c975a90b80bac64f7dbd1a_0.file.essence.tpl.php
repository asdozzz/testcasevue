<?php
/* Smarty version 3.1.31, created on 2017-10-30 07:23:49
  from "C:\OpenServer524\OpenServer\domains\vika\packages\Asdozzz\Vika\src\Filemakers\templates\essence.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f6d385bd1850_90624713',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87c22365aeeab3f775c975a90b80bac64f7dbd1a' => 
    array (
      0 => 'C:\\OpenServer524\\OpenServer\\domains\\vika\\packages\\Asdozzz\\Vika\\src\\Filemakers\\templates\\essence.tpl',
      1 => 1509344959,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f6d385bd1850_90624713 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>namespace Asdozzz\Users\Essences;

use DB;

class <?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
 extends \Asdozzz\Essence\Essences\Essence implements \Asdozzz\Essence\Interfaces\iEssence
{
    public $primary_key   = 'id';
    public $table         = '<?php ob_start();
echo mb_strtolower($_smarty_tpl->tpl_vars['essence']->value, 'UTF-8');
$_prefixVariable2=ob_get_clean();
echo $_prefixVariable2;?>
';
    public $label         = '<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable3=ob_get_clean();
echo $_prefixVariable3;?>
';
    public $softDeletes   = true;
    public $deleted_field = 'deleted_at';

    public function getPermissions()
    {
        return array(
            'listing' => 'listing.'.$this->table,
            'read'    => 'read.'.$this->table,
            'create'  => 'create.'.$this->table,
            'update'  => 'update.'.$this->table,
            'delete'  => 'delete.'.$this->table
        );
    }

    public function getColumns()
    {
        return array(
            'id' => \Columns::factory('PrimaryKey')->get(),
            /* Columns */
        );
    }

    public function getForms()
    {
        $columns = $this->getColumns();

        return [
            'create' =>
            [
                'label'   => 'Add',
                'columns' => [
                    /* Columns */
                ],
            ],
            'edit' =>
            [
                'label'   => 'Edit',
                'columns' =>
                [
                    $columns['id'],
                    /* Columns */
                ],
            ],
        ];
    }
}<?php }
}
