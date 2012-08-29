<ul class="lavaLamp" id="lavalamp-menu">
	{foreach from=$mainMenu item=i}
		<li {if $i.active} class="current" {/if} ><a href="/{$i.href}">{$i.title}</a></li>
	{/foreach}
</ul>
