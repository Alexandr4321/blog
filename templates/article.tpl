{extends file="layout.tpl"}

{block name="content"}
    <div class="breadcrumb">
        <a href="/">Главная</a>
        {if $categories|@count > 0}
            / <a href="/category/{$categories[0].id}">{$categories[0].name|escape}</a>
        {/if}
        / <span>{$article.title|escape}</span>
    </div>

    <article class="article">
        {if $article.image}
            <div class="article-cover">
                <img src="/assets/images/{$article.image}" alt="{$article.title|escape}">
            </div>
        {/if}

        <header class="article-header">
            <h1 class="page-title">{$article.title|escape}</h1>
            <div class="article-meta">
                <time datetime="{$article.created_at}">{$article.created_at|date_format:"%d.%m.%Y %H:%M"}</time>
                <span>👁 {$article.views} просмотров</span>
            </div>
            {if $categories|@count > 0}
                <div class="article-tags">
                    {foreach $categories as $cat}
                        <a href="/category/{$cat.id}" class="tag">{$cat.name|escape}</a>
                    {/foreach}
                </div>
            {/if}
        </header>

        {if $article.description}
            <p class="article-lead">{$article.description|escape}</p>
        {/if}

        <div class="article-body">
            {$article.body|nl2br}
        </div>
    </article>

    {if $similar|@count > 0}
        <section class="similar">
            <h2 class="section-title">Похожие статьи</h2>
            <div class="cards-grid">
                {foreach $similar as $article}
                    {include file="partials/article_card.tpl" article=$article}
                {/foreach}
            </div>
        </section>
    {/if}
{/block}
