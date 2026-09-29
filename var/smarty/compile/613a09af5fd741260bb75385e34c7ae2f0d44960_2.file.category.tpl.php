<?php
/* Smarty version 4.5.7, created on 2026-09-29 15:05:44
  from '/var/www/html/templates/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.7',
  'unifunc' => 'content_6abbd3c83050e4_51606119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '613a09af5fd741260bb75385e34c7ae2f0d44960' => 
    array (
      0 => '/var/www/html/templates/category.tpl',
      1 => 1790685473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/article_card.tpl' => 1,
  ),
),false)) {
function content_6abbd3c83050e4_51606119 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13149455566abbd3c80ae939_15966912', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_13149455566abbd3c80ae939_15966912 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13149455566abbd3c80ae939_15966912',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/smarty-4.5.7/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>

    <div class="breadcrumb">
        <a href="/">Главная</a> / <span><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</span>
    </div>

    <header class="category-header">
        <h1 class="page-title"><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</h1>
        <?php if ($_smarty_tpl->tpl_vars['category']->value['description']) {?>
            <p class="category-desc"><?php echo htmlspecialchars((string) (htmlspecialchars((string)$_smarty_tpl->tpl_vars['category']->value['description'], ENT_QUOTES, 'UTF-8', true)), ENT_QUOTES, 'UTF-8');?>
</p>
        <?php }?>
    </header>

    <div class="toolbar">
        <div class="sort">
            <span>Сортировка:</span>
            <a href="?sort=date<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page'] > 1) {?>&page=<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['pagination']->value['page']), ENT_QUOTES, 'UTF-8');
}?>"
               class="sort-link <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'date') {?>active<?php }?>">По дате</a>
            <a href="?sort=views<?php if ($_smarty_tpl->tpl_vars['pagination']->value['page'] > 1) {?>&page=<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['pagination']->value['page']), ENT_QUOTES, 'UTF-8');
}?>"
               class="sort-link <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'views') {?>active<?php }?>">По просмотрам</a>
        </div>
        <div class="total">Всего: <?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['pagination']->value['total']), ENT_QUOTES, 'UTF-8');?>
</div>
    </div>

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['articles']->value) == 0) {?>
        <p class="empty">В этой категории пока нет статей.</p>
    <?php } else { ?>
        <div class="cards-grid">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
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

        <?php if ($_smarty_tpl->tpl_vars['pagination']->value['total_pages'] > 1) {?>
            <nav class="pagination">
                <?php if ($_smarty_tpl->tpl_vars['pagination']->value['page'] > 1) {?>
                    <a href="?sort=<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['sort']->value), ENT_QUOTES, 'UTF-8');?>
&page=<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['pagination']->value['page']-1), ENT_QUOTES, 'UTF-8');?>
" class="page-link">← Назад</a>
                <?php }?>

                <?php
$_smarty_tpl->tpl_vars['p'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int) ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value['total_pages']+1 - (1) : 1-($_smarty_tpl->tpl_vars['pagination']->value['total_pages'])+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0) {
for ($_smarty_tpl->tpl_vars['p']->value = 1, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++) {
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration === 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration === $_smarty_tpl->tpl_vars['p']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['p']->value == $_smarty_tpl->tpl_vars['pagination']->value['page']) {?>
                        <span class="page-link active"><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['p']->value), ENT_QUOTES, 'UTF-8');?>
</span>
                    <?php } else { ?>
                        <a href="?sort=<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['sort']->value), ENT_QUOTES, 'UTF-8');?>
&page=<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['p']->value), ENT_QUOTES, 'UTF-8');?>
" class="page-link"><?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['p']->value), ENT_QUOTES, 'UTF-8');?>
</a>
                    <?php }?>
                <?php }
}
?>

                <?php if ($_smarty_tpl->tpl_vars['pagination']->value['page'] < $_smarty_tpl->tpl_vars['pagination']->value['total_pages']) {?>
                    <a href="?sort=<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['sort']->value), ENT_QUOTES, 'UTF-8');?>
&page=<?php echo htmlspecialchars((string) ($_smarty_tpl->tpl_vars['pagination']->value['page']+1), ENT_QUOTES, 'UTF-8');?>
" class="page-link">Вперёд →</a>
                <?php }?>
            </nav>
        <?php }?>
    <?php }
}
}
/* {/block "content"} */
}
