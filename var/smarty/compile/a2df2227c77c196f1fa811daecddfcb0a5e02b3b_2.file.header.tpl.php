<?php
/* Smarty version 4.5.7, created on 2026-09-29 15:05:00
  from '/var/www/html/templates/partials/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.7',
  'unifunc' => 'content_6abbd39cd567d9_62905037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2df2227c77c196f1fa811daecddfcb0a5e02b3b' => 
    array (
      0 => '/var/www/html/templates/partials/header.tpl',
      1 => 1790685456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abbd39cd567d9_62905037 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="site-header">
    <div class="container header-inner">
        <a href="/" class="logo"><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['app_name']->value), ENT_QUOTES, 'UTF-8');?>
</a>
        <nav>
            <a href="/">Главная</a>
        </nav>
    </div>
</header>
<?php }
}
