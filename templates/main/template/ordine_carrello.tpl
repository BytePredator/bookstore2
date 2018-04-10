        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>Carrello</h1>
          {if $dati!= false}
          <form action="index.php" method="post">
          <table id="carrello">
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Subtotale</th></tr>
            {section name=i loop=$dati.oggetti}
            <tr><th scope="row">{$dati.oggetti[i].titolo}</th>
                <td>{$dati.oggetti[i].autore}</td>
                <td id="numero"><input type="text" name="quantita[{$smarty.section.i.iteration}]" value="{$dati.oggetti[i].quantita}" size="1" /></td>
                <td id="numero">{$dati.oggetti[i].prezzo|string_format:"%.2f"}</td>
                {assign var="sub" value="`$dati.oggetti[i].quantita*$dati.oggetti[i].prezzo`"}
                <td id="numero">{$sub|string_format:"%.2f"}</td></tr>
            {/section}
            <tr><th scope="row" id="numero" colspan="3"></th><th scope="col">Totale:</th><td id="numero">{$dati.totale|string_format:"%.2f"}</td></tr>
            <tr><td colspan="3"></td><td colspan="2"><input id="button" type="submit" name="task" value="Svuota" /><input id="button" type="submit" name="task" value="Aggiorna Carrello" /></td></tr>
          </table>
          <input type="hidden" name="controller" value="ordine" />
          </form>
          {else}
            <p>Il carrello &egrave; vuoto.</p>
          {/if}
        </div>
        <div class="corner-content-1col-bottom"></div>
