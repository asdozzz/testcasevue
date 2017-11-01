<?php
/* Smarty version 3.1.31, created on 2017-10-31 19:47:14
  from "C:\OpenServer524\OpenServer\domains\vika\packages\Asdozzz\Vika\src\Filemakers\templates\ServiceProvider.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f8d342a40393_95383128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48ec9e8f418221b5dcecc321f1eddc41ea579ea0' => 
    array (
      0 => 'C:\\OpenServer524\\OpenServer\\domains\\vika\\packages\\Asdozzz\\Vika\\src\\Filemakers\\templates\\ServiceProvider.tpl',
      1 => 1509292211,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f8d342a40393_95383128 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>namespace Asdozzz\<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['module']->value);
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
;

use Illuminate\Support\ServiceProvider;

class <?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable2=ob_get_clean();
echo $_prefixVariable2;?>
ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}<?php }
}
