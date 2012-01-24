{* Smarty *}

  {include file='phasenmenu.tpl'}
	
	<div>
	  <h2>{$phase->getName ()}</h2>
		
		<form method = "POST" action="tippspeichern.php">
			<table>
				{foreach key=i item=begegnung from=$begegnungen}
					<tr>
						<td>{$begegnung->getMannschaft1 ()->getName ()}</td>
						<td>
						  {if $begegnung->getTimestamp () > time()}
						    <input type="text" class="tipp1" name="{$begegnung->getId ()}1" value="{$begegnung->getTipp ()->getTore1 ()}" maxlength="2"/>
							{else}
							  <input type="text" class="tipp1" name="{$begegnung->getId ()}1" value="{$begegnung->getTipp ()->getTore1 ()} ({$begegnung->getTore1 ()})" disabled="1" maxlength="2"/>
							{/if}
						</td>
						<td>:</td>
						<td>
						  {if $begegnung->getTimestamp () > time()}
						    <input type="text" class="tipp2" name="{$begegnung->getId ()}2" value="{$begegnung->getTipp ()->getTore2 ()}" maxlength="2"/>
							{else}
							  <input type="text" class="tipp2" name="{$begegnung->getId ()}2" value="{$begegnung->getTipp ()->getTore2 ()} ({$begegnung->getTore2 ()})" disabled="1" maxlength="2"/>  
							{/if}
						</td>
						<td>{$begegnung->getMannschaft2 ()->getName ()}</td>
						<td>{{$begegnung->getTimestamp ()}|date_format:"am %d.%m.%Y um %H:%M Uhr"}</td>
						<td>
						  {if $begegnung->getTimestamp () < time()}
						    <input type="button" class="UserTipps" value="User-Tipps" name="{$begegnung->getId ()}"/>
							{/if}
						</td>
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
		
		<div id="usertipps"></div>
	</div>