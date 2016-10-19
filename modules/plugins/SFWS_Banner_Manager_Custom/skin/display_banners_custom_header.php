{if isset($HEADER_BANNER_IMAGES)}

	<style type="text/css">
	.headerbanner{
		max-height: {$SFWS_HEADER_BANNER_HEIGHT}px;
		max-width: {$SFWS_HEADER_BANNER_WIDTH}px;
		margin-bottom: 10px;
	}
	.headerbanner img{
		padding: {$SFWS_HEADER_BANNER_PADDING}px;
		border: {$SFWS_HEADER_BANNER_BORDER_WIDTH}px solid {$SFWS_HEADER_BANNER_BORDER_COLOR};
		background-color: {$SFWS_HEADER_BANNER_BACKGROUND_COLOR};
	}
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.headerbanner').cycle({
				fx:      '{$SFWS_HEADER_BANNER_EFFECT}',
				speed:	 '{$SFWS_HEADER_BANNER_EFFECT_SPEED}',
				timeout: '{$SFWS_HEADER_BANNER_EFFECT_TIMEOUT}',
				pause:   '{$SFWS_HEADER_BANNER_EFFECT_PAUSE}'
			});
		});
	</script>

	<div class="headerbanner">
		{foreach from=$HEADER_BANNER_IMAGES item=headerbannerimage}
			<a href="{$headerbannerimage.url}" target="{$headerbannerimage.url_target}" title="{$headerbannerimage.name}"><img src="{$headerbannerimage.image}" alt="{$headerbannerimage.name}" /></a>
		{/foreach}
	</div>

{/if}