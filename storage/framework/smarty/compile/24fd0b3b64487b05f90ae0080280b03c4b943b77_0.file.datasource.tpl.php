<?php
/* Smarty version 3.1.31, created on 2017-10-31 19:47:14
  from "C:\OpenServer524\OpenServer\domains\vika\packages\Asdozzz\Vika\src\Filemakers\templates\datasource.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f8d342d338b1_97759914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24fd0b3b64487b05f90ae0080280b03c4b943b77' => 
    array (
      0 => 'C:\\OpenServer524\\OpenServer\\domains\\vika\\packages\\Asdozzz\\Vika\\src\\Filemakers\\templates\\datasource.tpl',
      1 => 1509293492,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f8d342d338b1_97759914 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>namespace Asdozzz\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['module']->value);
$_prefixVariable20=ob_get_clean();
echo $_prefixVariable20;?>
\Datasource;

class <?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable21=ob_get_clean();
echo $_prefixVariable21;?>
 extends \Asdozzz\Universal\Datasource\Universal
{
	public $primary_key = 'id';
	public $table = '<?php ob_start();
echo $_smarty_tpl->tpl_vars['config']->value->table;
$_prefixVariable22=ob_get_clean();
echo $_prefixVariable22;?>
';
}<?php }
}
