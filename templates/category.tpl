{extends file="layout.tpl"}

{block name="content"}
    <div class="breadcrumb">
        <a href="/">Главная</a> / <span>{$category.name|escape}</span>
    </div>

    <header class="category-header">
        <h1 class="page-title">{$category.name|escape}</h1>
        {if $category.description}
            <p class="category-desc">{$category.description|escape}</p>
        {/if}
    </header>

    <div class="toolbar">
        <div class="sort">
            <span>Сортировка:</span>
            <a href="?sort=date{if $pagination.page > 1}&page={$pagination.page}{/if}"
               class="sort-link {if $sort == 'date'}active{/if}">По дате</a>
            <a href="?sort=views{if $pagination.page > 1}&page={$pagination.page}{/if}"
               class="sort-link {if $sort == 'views'}active{/if}">По просмотрам</a>
        </div>
        <div class="total">Всего: {$pagination.total}</div>
    </div>

    {if $articles|@count == 0}
        <p class="empty">В этой категории пока нет статей.</p>
    {else}
        <div class="cards-grid">
            {foreach $articles as $article}
                {include file="partials/article_card.tpl" article=$article}
            {/foreach}
        </div>

        {if $pagination.total_pages > 1}
            <nav class="pagination">
                {if $pagination.page > 1}
                    <a href="?sort={$sort}&page={$pagination.page - 1}" class="page-link">← Назад</a>
                {/if}

                {for $p=1 to $pagination.total_pages}
                    {if $p == $pagination.page}
                        <span class="page-link active">{$p}</span>
                    {else}
                        <a href="?sort={$sort}&page={$p}" class="page-link">{$p}</a>
                    {/if}
                {/for}

                {if $pagination.page < $pagination.total_pages}
                    <a href="?sort={$sort}&page={$pagination.page + 1}" class="page-link">Вперёд →</a>
                {/if}
            </nav>
        {/if}
    {/if}
{/block}
