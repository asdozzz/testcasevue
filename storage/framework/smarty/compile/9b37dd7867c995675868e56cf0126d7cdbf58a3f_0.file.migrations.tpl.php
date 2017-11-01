<?php
/* Smarty version 3.1.31, created on 2017-10-31 19:47:14
  from "C:\OpenServer524\OpenServer\domains\vika\packages\Asdozzz\Vika\src\Filemakers\templates\migrations.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59f8d342bd0028_64624363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b37dd7867c995675868e56cf0126d7cdbf58a3f' => 
    array (
      0 => 'C:\\OpenServer524\\OpenServer\\domains\\vika\\packages\\Asdozzz\\Vika\\src\\Filemakers\\templates\\migrations.tpl',
      1 => 1509372780,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f8d342bd0028_64624363 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create<?php ob_start();
echo ucfirst($_smarty_tpl->tpl_vars['essence']->value);
$_prefixVariable3=ob_get_clean();
echo $_prefixVariable3;?>
Table extends Migration
{
    public function up()
    {
        $sql = "<?php ob_start();
echo $_smarty_tpl->tpl_vars['create_sql']->value;
$_prefixVariable4=ob_get_clean();
echo $_prefixVariable4;?>
";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }

    public function down()
    {
        $sql = "<?php ob_start();
echo $_smarty_tpl->tpl_vars['drop_sql']->value;
$_prefixVariable5=ob_get_clean();
echo $_prefixVariable5;?>
";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
<?php }
}
