<article class="card">
    {if $article.image}
        <a href="/article/{$article.id}" class="card-image">
            <img src="/assets/images/{$article.image}" alt="{$article.title|escape}">
        </a>
    {else}
        <a href="/article/{$article.id}" class="card-image card-image--placeholder">
            <span>Нет изображения</span>
        </a>
    {/if}
    <div class="card-body">
        <h3 class="card-title">
            <a href="/article/{$article.id}">{$article.title|escape}</a>
        </h3>
        {if $article.description}
            <p class="card-desc">{$article.description|escape|truncate:120}</p>
        {/if}
        <div class="card-meta">
            <span>👁 {$article.views}</span>
            <time datetime="{$article.created_at}">{$article.created_at|date_format:"%d.%m.%Y"}</time>
        </div>
    </div>
</article>
