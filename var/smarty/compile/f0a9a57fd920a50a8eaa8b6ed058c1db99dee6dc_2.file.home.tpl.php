<?php
/* Smarty version 4.5.7, created on 2026-09-29 15:05:00
  from '/var/www/html/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.7',
  'unifunc' => 'content_6abbd39ca68568_13430056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0a9a57fd920a50a8eaa8b6ed058c1db99dee6dc' => 
    array (
      0 => '/var/www/html/templates/home.tpl',
      1 => 1790685465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/article_card.tpl' => 1,
  ),
),false)) {
function content_6abbd39ca68568_13430056 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19969150386abbd39c6aad00_07709807', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_19969150386abbd39c6aad00_07709807 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19969150386abbd39c6aad00_07709807',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/smarty-4.5.7/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>

    <h1 class="page-title">Блог</h1>

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['sections']->value) == 0) {?>
        <p class="empty">Пока нет категорий со статьями.</p>
    <?php } else { ?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sections']->value, 'section');
$_smarty_tpl->tpl_vars['section']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['section']->value) {
$_smarty_tpl->tpl_vars['section']->do_else = false;
?>
            <section class="category-section">
                <div class="section-header">
                    <div>
                        <h2 class="section-title">
                            <a href="/category/<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['section']->value['category']['id']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['section']->value['category']['name'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</a>
                        </h2>
                        <?php if ($_smarty_tpl->tpl_vars['section']->value['category']['description']) {?>
                            <p class="section-desc"><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['section']->value['category']['description'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</p>
                        <?php }?>
                    </div>
                    <a href="/category/<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['section']->value['category']['id']), ENT_QUOTES, 'UTF-8');?>
" class="btn btn-outline">Все статьи</a>
                </div>

                <div class="cards-grid">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['section']->value['articles'], 'article');
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
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }
}
}
/* {/block "content"} */
}
