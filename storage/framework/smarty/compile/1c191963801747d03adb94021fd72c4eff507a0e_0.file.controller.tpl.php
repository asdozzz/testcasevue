<?php
/* Smarty version 3.1.31, created on 2017-10-31 19:47:14
  from "C:\OpenServer524\OpenServer\domains\vika\packages\Asdozzz\Vika\src\Filemakers\templates\controller.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f8d342c2e303_53969592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c191963801747d03adb94021fd72c4eff507a0e' => 
    array (
      0 => 'C:\\OpenServer524\\OpenServer\\domains\\vika\\packages\\Asdozzz\\Vika\\src\\Filemakers\\templates\\controller.tpl',
      1 => 1509293558,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f8d342c2e303_53969592 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>namespace Asdozzz\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['module']->value);
$_prefixVariable6=ob_get_clean();
echo $_prefixVariable6;?>
\Controller;

class <?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable7=ob_get_clean();
echo $_prefixVariable7;?>
Controller extends \Asdozzz\Universal\Controller\UniversalController
{
	public $businessName = '\Asdozzz\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['module']->value);
$_prefixVariable8=ob_get_clean();
echo $_prefixVariable8;?>
\Business\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable9=ob_get_clean();
echo $_prefixVariable9;?>
';
}<?php }
}
