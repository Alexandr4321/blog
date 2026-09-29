<?php
/* Smarty version 4.5.7, created on 2026-09-29 18:11:09
  from '/var/www/html/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.7',
  'unifunc' => 'content_6abbff3de972b2_15306400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7ce982e87a0751ddfd330495858f5b00ae2a65a' => 
    array (
      0 => '/var/www/html/templates/article.tpl',
      1 => 1790685479,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/article_card.tpl' => 1,
  ),
),false)) {
function content_6abbff3de972b2_15306400 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18715685226abbff3dd21490_49666847', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_18715685226abbff3dd21490_49666847 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18715685226abbff3dd21490_49666847',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/smarty-4.5.7/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'/var/www/html/smarty-4.5.7/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <div class="breadcrumb">
        <a href="/">Главная</a>
        <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['categories']->value) > 0) {?>
            / <a href="/category/<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['categories']->value[0]['id']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['categories']->value[0]['name'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</a>
        <?php }?>
        / <span><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</span>
    </div>

    <article class="article">
        <?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
            <div class="article-cover">
                <img src="/assets/images/<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['article']->value['image']), ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
">
            </div>
        <?php }?>

        <header class="article-header">
            <h1 class="page-title"><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value['title'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</h1>
            <div class="article-meta">
                <time datetime="<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['article']->value['created_at']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) (smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['created_at'],"%d.%m.%Y %H:%M")), ENT_QUOTES, 'UTF-8');?>
</time>
                <span>👁 <?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['article']->value['views']), ENT_QUOTES, 'UTF-8');?>
 просмотров</span>
            </div>
            <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['categories']->value) > 0) {?>
                <div class="article-tags">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                        <a href="/category/<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['cat']->value['id']), ENT_QUOTES, 'UTF-8');?>
" class="tag"><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['cat']->value['name'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php }?>
        </header>

        <?php if ($_smarty_tpl->tpl_vars['article']->value['description']) {?>
            <p class="article-lead"><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['article']->value['description'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</p>
        <?php }?>

        <div class="article-body">
            <?php echo htmlspecialchars((string) (nl2br((string) $_smarty_tpl->tpl_vars['article']->value['body'], (bool) 1)), ENT_QUOTES, 'UTF-8');?>

        </div>
    </article>

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['similar']->value) > 0) {?>
        <section class="similar">
            <h2 class="section-title">Похожие статьи</h2>
            <div class="cards-grid">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['similar']->value, 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
                    <?php $_smarty_tpl->_subTemplateRender("file:partials/article_card.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('article'=>$_smarty_tpl->tpl_vars['article']->value), 0, true);
?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </section>
    <?php }
}
}
/* {/block "content"} */
}
