{* Smarty *}

  {include file='phasenmenu.tpl'}
	
  <h2>{$phase->getName ()}</h2>
	<div>
		<form method = "POST" action="tippspeichern.php">
			<table>
				{foreach key=i item=begegnung from=$begegnungen}
					<tr>
						<td>{$begegnung->getMannschaft1 ()->getName ()}</td>
						<td><input type="text" name="{$begegnung->getId ()}1" value="{$begegnung->getTipp ()->getTore1 ()}"/></td>
						<td>:</td>
						<td><input type="text" name="{$begegnung->getId ()}2" value="{$begegnung->getTipp ()->getTore2 ()}"/></td>
						<td>{$begegnung->getMannschaft2 ()->getName ()}</td>
						<td>{{$begegnung->getTimestamp ()}|date_format:"am %d.%m.%Y um %H:%M Uhr"}</td>
					</tr>
				{/foreach}
			</table>
			
			{if (sizeof ($begegnungen) > 0)}
			  <input type="submit" value="Speichern"/>
			  <input type="button" value="Verwerfen" onClick="window.location.href=window.location.href"/>
			{else}
			  Keine Begegnungen vorhanden!
			{/if}
		</form>
	</div>