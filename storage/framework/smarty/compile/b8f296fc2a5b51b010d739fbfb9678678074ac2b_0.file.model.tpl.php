<?php
/* Smarty version 3.1.31, created on 2017-10-31 19:47:14
  from "C:\OpenServer524\OpenServer\domains\vika\packages\Asdozzz\Vika\src\Filemakers\templates\model.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f8d342ccc0a2_79209912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8f296fc2a5b51b010d739fbfb9678678074ac2b' => 
    array (
      0 => 'C:\\OpenServer524\\OpenServer\\domains\\vika\\packages\\Asdozzz\\Vika\\src\\Filemakers\\templates\\model.tpl',
      1 => 1509292739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f8d342ccc0a2_79209912 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>namespace Asdozzz\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['module']->value);
$_prefixVariable14=ob_get_clean();
echo $_prefixVariable14;?>
\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class <?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable15=ob_get_clean();
echo $_prefixVariable15;?>
 extends \Asdozzz\Universal\Model\Universal
{
	protected $table = '<?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value->table;
$_prefixVariable16=ob_get_clean();
echo $_prefixVariable16;?>
';
  	protected $essenceName = '<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable17=ob_get_clean();
echo $_prefixVariable17;?>
';
  	protected $datasourceName = '\Asdozzz\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['module']->value);
$_prefixVariable18=ob_get_clean();
echo $_prefixVariable18;?>
\Datasource\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable19=ob_get_clean();
echo $_prefixVariable19;?>
';
  	protected $softDeletes = false;
}<?php }
}
