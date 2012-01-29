{* Smarty *}
    
  {include file='phasenmenu.tpl'}
	
	<div>
	  <h2>{$phase->getName ()}</h2>
			<table border = 1>
			<tr><td>Rang</td><td>Username</td><td>Punkte</td></tr>
			{foreach key=i item=username from=$usernames}
			<tr><td>{$i+1}</td><td>{$username}</td><td>{$punkten.$i}</td></tr>
			{/foreach}	
		</table>
	</div>
</body>	
</html>	
