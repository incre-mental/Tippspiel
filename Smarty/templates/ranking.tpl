{* Smarty *}
    
  {include file='phasenmenu.tpl'}
	
	<div>
		{if ($phase->getName () == "")}
			 Keine Begegnungen vorhanden!
		{else}
				 
			
	  <h2>{$phase->getName ()}</h2>
			<table border = 0 width = 60%>
			<tr><td>Rang</td><td>Username</td><td>Punkte</td></tr>
			{foreach key=i item=username from=$usernames}
			<tr><td>{$i+1}</td><td>{$username}</td><td>{$punkten.$i}</td></tr>
			{/foreach}	
		</table>
	{/if}
	</div>
</body>	
</html>	
