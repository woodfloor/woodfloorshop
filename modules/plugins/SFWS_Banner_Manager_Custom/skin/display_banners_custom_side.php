{if isset($SIDE_BANNER_IMAGES)}

	<style type="text/css">
	.sidebanner{
		max-height: {$SFWS_SIDE_BANNER_HEIGHT}px;
		max-width: {$SFWS_SIDE_BANNER_WIDTH}px;
		margin: 10px auto;
		margin-bottom: 20px;
		text-align: center;
	}
	.sidebanner img{
		padding: {$SFWS_SIDE_BANNER_PADDING}px;
		border: {$SFWS_SIDE_BANNER_BORDER_WIDTH}px solid {$SFWS_SIDE_BANNER_BORDER_COLOR};
		background-color: {$SFWS_SIDE_BANNER_BACKGROUND_COLOR};
	}
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.sidebanner').cycle({
				fx:      '{$SFWS_SIDE_BANNER_EFFECT}',
				speed:	 '{$SFWS_SIDE_BANNER_EFFECT_SPEED}',
				timeout: '{$SFWS_SIDE_BANNER_EFFECT_TIMEOUT}',
				pause:   '{$SFWS_SIDE_BANNER_EFFECT_PAUSE}'
			});
		});
	</script>

	<div class="sidebanner">
		{foreach from=$SIDE_BANNER_IMAGES item=sidebannerimage}
			<a href="{$sidebannerimage.url}" target="{$sidebannerimage.url_target}" title="{$sidebannerimage.name}"><img src="{$sidebannerimage.image}" alt="{$sidebannerimage.name}" /></a>
		{/foreach}
	</div>

{/if}