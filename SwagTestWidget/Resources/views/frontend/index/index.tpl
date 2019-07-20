{extends file="parent:frontend/index/index.tpl"}

{block name='frontend_index_content_main'}
    <div class=" content-main container block-group">
        {block name='frontend_index_breadcrumb'}
            <nav class="content--breadcrumb block">
                {block name='frontend_index_breadcrumb_inner'}
                    {if $pluginConfiguration.widgetTile }
                        {$pluginConfiguration.widgetTile}
                    {else}
                        Recent Product
                    {/if}
                {/block}
            </nav>
        {/block}
        <div class="content-main--inner">
            <div class="content listing--content">
                {foreach $products as $sArticle}
                    {include file="frontend/index/product.tpl" productBoxLayout="basic"}
                {/foreach}
            </div>
        </div>
    </div>
{/block}
