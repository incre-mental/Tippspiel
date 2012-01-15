{* Smarty *}

<link rel="stylesheet" type="text/css" href="style.css">
<script type='text/javascript' src="jquery-1.7.1.js"></script>

<div class="GruppenMenu">
{foreach key=i item=phase from=$phasen}
  <div class="GruppenMenuEintrag" id="{$phase->getId ()}">{$phase->getName ()}</div>
  {foreach key=j item=child from=$phase->getChilds ()} 
	  <div class="GruppenMenuUntereintrag" id="{$child->getId ()}">{$child->getName ()}</div> 
	{/foreach}
{/foreach}
</div>

<script type='text/javascript' src="menu.js"></script>