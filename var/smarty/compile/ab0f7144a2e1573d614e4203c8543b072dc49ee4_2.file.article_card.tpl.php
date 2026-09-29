<?php
/* Smarty version 4.5.7, created on 2026-09-29 15:05:01
  from '/var/www/html/templates/partials/article_card.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.7',
  'unifunc' => 'content_6abbd39d010340_74283087',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab0f7144a2e1573d614e4203c8543b072dc49ee4' => 
    array (
      0 => '/var/www/html/templates/partials/article_card.tpl',
      1 => 1790685461,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abbd39d010340_74283087 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/smarty-4.5.7/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'/var/www/html/smarty-4.5.7/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<article class="card">
    <?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
        <a href="/article/<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['article']->value['id']), ENT_QUOTES, 'UTF-8');?>
" class="card-image">
            <img src="/assets/images/<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['article']->value['image']), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
">
        </a>
    <?php } else { ?>
        <a href="/article/<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['article']->value['id']), ENT_QUOTES, 'UTF-8');?>
" class="card-image card-image--placeholder">
            <span>Нет изображения</span>
        </a>
    <?php }?>
    <div class="card-body">
        <h3 class="card-title">
            <a href="/article/<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['article']->value['id']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</a>
        </h3>
        <?php if ($_smarty_tpl->tpl_vars['article']->value['description']) {?>
            <p class="card-desc"><?php echo htmlspecialchars((string) (smarty_modifier_truncate(htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value['description'], ENT_QUOTES, 'UTF-8', true),120)), ENT_QUOTES, 'UTF-8');?>
</p>
        <?php }?>
        <div class="card-meta">
            <span>👁 <?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['article']->value['views']), ENT_QUOTES, 'UTF-8');?>
</span>
            <time datetime="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['article']->value['created_at']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) (smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['created_at'],"%d.%m.%Y")), ENT_QUOTES, 'UTF-8');?>
</time>
        </div>
    </div>
</article>
<?php }
}
