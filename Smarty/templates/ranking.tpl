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
			{if ($username == $aktuser)}
			<tr><td><b>{$i+1}</b></td><td><b>{$username}</b></td><td><b>{$punkten.$i}</b></td></tr>
			{else}
			<tr><td>{$i+1}</td><td>{$username}</td><td>{$punkten.$i}</td></tr>
			{/if}
			{/foreach}	
		</table>
	{/if}
	</div>
</body>	
</html>	
