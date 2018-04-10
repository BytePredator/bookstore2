        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>{$dati.titolo}</h1>
          <h5>{$dati.autore}</h5>
          <p><img height="200" src="copertine/{$dati.copertina}" alt="{$dati.titolo}" title="{$dati.titolo}">{$dati.descrizione}</p>
          {if $dati.commento!=false}
          {section name=i loop=$dati.commento}
              {assign var="somma" value="`$dati.commento[i].votazione+$somma`"}
              {assign var="max" value="`$smarty.section.i.max`"}
          {/section}
          {/if}
          <p class="details"><b>Media Voti:</b> | <a href="#">{if $max>0}{$somma/$max|string_format:"%.2f"}{else}-{/if}</a> | Categoria: <a href="#">{$dati.categoria}</a> | Prezzo: <a href="#">{$dati.prezzo}</a> |</p>
          {section name=j loop=$dati.commento}
          <h5 class="line">{$dati.commento[j].autore_username}</h5>
          <blockquote>
            <p>{$dati.commento[j].commento}</p>
            <p>voto: {$dati.commento[j].votazione}</p>
          </blockquote>
          {/section}
        </div>
        <div class="corner-content-1col-bottom"></div>
