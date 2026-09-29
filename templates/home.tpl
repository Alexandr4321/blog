{extends file="layout.tpl"}

{block name="content"}
    <h1 class="page-title">Блог</h1>

    {if $sections|@count == 0}
        <p class="empty">Пока нет категорий со статьями.</p>
    {else}
        {foreach $sections as $section}
            <section class="category-section">
                <div class="section-header">
                    <div>
                        <h2 class="section-title">
                            <a href="/category/{$section.category.id}">{$section.category.name|escape}</a>
                        </h2>
                        {if $section.category.description}
                            <p class="section-desc">{$section.category.description|escape}</p>
                        {/if}
                    </div>
                    <a href="/category/{$section.category.id}" class="btn btn-outline">Все статьи</a>
                </div>

                <div class="cards-grid">
                    {foreach $section.articles as $article}
                        {include file="partials/article_card.tpl" article=$article}
                    {/foreach}
                </div>
            </section>
        {/foreach}
    {/if}
{/block}
