{* Smarty *}


<div class="GruppenMenu">
	<div id="accordion">
	{foreach key=i item=phase from=$phasen}
  		<div class="GruppenMenuEintrag" id="{$phase->getId ()}">
  		<h3><a href="#">{$phase->getName ()}</a></h3>
  		<!--{$phase->getName ()}-->
  		</div>
  			{foreach key=j item=child from=$phase->getChilds ()} 
	  			<div class="GruppenMenuUntereintrag" id="{$child->getId ()}">{$child->getName ()}</div> 
			{/foreach}
	{/foreach}
	</div>
</div>
 
<script type='text/javascript' src="menu.js"></script>
