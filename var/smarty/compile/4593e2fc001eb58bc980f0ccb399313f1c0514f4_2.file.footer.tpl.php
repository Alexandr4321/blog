<?php
/* Smarty version 4.5.7, created on 2026-09-29 15:05:01
  from '/var/www/html/templates/partials/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.7',
  'unifunc' => 'content_6abbd39d22e898_79692590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4593e2fc001eb58bc980f0ccb399313f1c0514f4' => 
    array (
      0 => '/var/www/html/templates/partials/footer.tpl',
      1 => 1790685457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abbd39d22e898_79692590 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/smarty-4.5.7/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<footer class="site-footer">
    <div class="container">
        <p>&copy; <?php echo htmlspecialchars((string) (smarty_modifier_date_format(time(),"%Y")), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['app_name']->value), ENT_QUOTES, 'UTF-8');?>
. Тестовое задание.</p>
    </div>
</footer>
<?php }
}
