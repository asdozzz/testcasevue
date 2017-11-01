<?php
/* Smarty version 3.1.31, created on 2017-10-31 19:47:14
  from "C:\OpenServer524\OpenServer\domains\vika\packages\Asdozzz\Vika\src\Filemakers\templates\business.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f8d342c7da21_03119181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47718348846a01827cc51fbdc7dc96d319251291' => 
    array (
      0 => 'C:\\OpenServer524\\OpenServer\\domains\\vika\\packages\\Asdozzz\\Vika\\src\\Filemakers\\templates\\business.tpl',
      1 => 1509292723,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f8d342c7da21_03119181 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>namespace Asdozzz\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['module']->value);
$_prefixVariable10=ob_get_clean();
echo $_prefixVariable10;?>
\Business;

class <?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable11=ob_get_clean();
echo $_prefixVariable11;?>
 extends \Asdozzz\Universal\Business\Universal
{
	public $modelName = '\Asdozzz\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['module']->value);
$_prefixVariable12=ob_get_clean();
echo $_prefixVariable12;?>
\Model\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable13=ob_get_clean();
echo $_prefixVariable13;?>
';
}<?php }
}
