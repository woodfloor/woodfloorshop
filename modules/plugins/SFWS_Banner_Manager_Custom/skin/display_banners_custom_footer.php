{if isset($FOOTER_BANNER_IMAGES)}

	<style type="text/css">
	.footerbanner{
		max-height: {$SFWS_FOOTER_BANNER_HEIGHT}px;
		max-width: {$SFWS_FOOTER_BANNER_WIDTH}px;
		margin: 10px auto;
	}
	.footerbanner img{
		padding: {$SFWS_FOOTER_BANNER_PADDING}px;
		border: {$SFWS_FOOTER_BANNER_BORDER_WIDTH}px solid {$SFWS_FOOTER_BANNER_BORDER_COLOR};
		background-color: {$SFWS_FOOTER_BANNER_BACKGROUND_COLOR};
	}
	</style>



	<script type="text/javascript">
		$(document).ready(function(){
			$('.footerbanner').cycle({
				fx:      '{$SFWS_FOOTER_BANNER_EFFECT}',
				speed:	 '{$SFWS_FOOTER_BANNER_EFFECT_SPEED}',
				timeout: '{$SFWS_FOOTER_BANNER_EFFECT_TIMEOUT}',
				pause:   '{$SFWS_FOOTER_BANNER_EFFECT_PAUSE}'
			});
		});
	</script>

	<div class="footerbanner">
		{foreach from=$FOOTER_BANNER_IMAGES item=footerbannerimage}
			<a href="{$footerbannerimage.url}" target="{$footerbannerimage.url_target}" title="{$footerbannerimage.name}"><img src="{$footerbannerimage.image}" alt="{$footerbannerimage.name}" /></a>
		{/foreach}
	</div>

{/if}