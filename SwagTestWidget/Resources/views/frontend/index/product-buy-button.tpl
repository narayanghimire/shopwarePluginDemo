{block name="redirct_to_produt_checkout_url"}
    {$productCheckOutUrl = {url module="frontend" controller="checkout" action='addArticle' } }
{/block}

{block name="frontend_listing_product_box_button_buy"}
    {block name="frontend_listing_product_box_button_buy_form"}
        {if $pluginConfiguration.redirect }
            <form name="sAddToBasket" method="post" action="{$productCheckOutUrl}" class="buybox--form" >
                <input type="hidden" name="sAdd" value="{$sArticle.ordernumber}">
                <input type="hidden" name="sTargetAction" value="confirm">
                <button class="buybox--button block btn is--primary is--icon-right is--center is--large">
                    <span class="buy-btn--cart-add">Buy Now</span> <span class="buy-btn--cart-text"></span><i class="icon--basket"></i> <i class="icon--arrow-right"></i>
                </button>
            </form>
        {else}
            {include file="frontend/listing/product-box/button-detail.tpl"}
        {/if}
    {/block}
{/block}
