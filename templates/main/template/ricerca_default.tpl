        <div class="content-1col-box">
          <!-- Subcell LEFT -->
          <div class="content-2col-box-leftcolumn">
            {if $dati != false}
            <!-- Subcell content -->
            {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 1}
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=ricerca&task=dettagli&id_libro={$dati[i].ISBN}">{$dati[i].titolo}</a></h1>
              <h5>{$dati[i].autore}</h5>
              <p><img height="120" src="copertine/{$dati[i].copertina}" alt="{$dati[i].titolo}" title="{$dati[i].titolo}">{$dati[i].descrizione|truncate:240:" [...]"}</p>
                  {assign var="somma" value="`0`"}
                  {assign var="max" value="`0`"}
              {section name=j loop=$dati[i].commento}
                  {assign var="somma" value="`$dati[i].commento[j].votazione+$somma`"}
                  {assign var="max" value="`$smarty.section.j.max`"}
              {/section}
              <p class="details"><b>Media Voti:</b> | <a href="#">{if $dati[i].media_voti>0}{$dati[i].media_voti}{else}-{/if}</a> | Categoria: <a href="#">{$dati[i].categoria}</a> | Prezzo: <a href="#">{$dati[i].prezzo|string_format:"%.2f"}</a> |</p>
              <form action="index.php" method="post">
              <input type="hidden" name="id_libro" value="{$dati[i].ISBN}" />
              <input id="button" type="submit" name="task" value="Aggiungi al Carrello" />
              <input type="hidden" name="controller" value="ordine" />
              </form>
            </div>
            <div class="corner-content-2col-bottom"></div>
            {/if}
            {/section}
            {/if}
          </div>
          <div class="content-2col-box-rightcolumn">
            {if $dati != false}
            <!-- Subcell content -->
            {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 0}
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=ricerca&task=dettagli&id_libro={$dati[i].ISBN}">{$dati[i].titolo}</a></h1>
              <h5>{$dati[i].autore}</h5>
              <p><img height="120" src="copertine/{$dati[i].copertina}" alt="{$dati[i].titolo}" title="{$dati[i].titolo}">{$dati[i].descrizione|truncate:240:" [...]"}</p>
                  {assign var="somma" value="`0`"}
                  {assign var="max" value="`0`"}
          {section name=k loop=$dati[i].commento}
              {assign var="somma" value="`$dati[i].commento[k].votazione+$somma`"}
              {assign var="max" value="`$smarty.section.k.max`"}
          {/section}
              <p class="details"><b>Media Voti:</b> | <a href="#">{if $dati[i].media_voti>0}{$dati[i].media_voti}{else}-{/if}</a> | Categoria: <a href="#">{$dati[i].categoria}</a> | Prezzo: <a href="#">{$dati[i].prezzo|string_format:"%.2f"}</a> |</p>
              <form action="index.php" method="post">
              <input type="hidden" name="id_libro" value="{$dati[i].ISBN}" />
              <input id="button" type="submit" name="task" value="Aggiungi al Carrello" />
              <input type="hidden" name="controller" value="ordine" />
              </form>
            </div>
            <div class="corner-content-2col-bottom"></div>
            {/if}
            {/section}
            {/if}
          </div>
       </div>
        {if $pagine!=''}
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
            <h2 class="pages">
           {section name=pages loop=$pagine}
               <a href="index.php?controller=ricerca&task={$task}{if $parametri!=''}&{$parametri}{/if}&page={$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>
           {/section}
           </h2>
        </div>
        <div class="corner-content-1col-bottom"></div>
        {/if}
