        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>Riepilogo Ordine</h1>
          <h5>{$dati.autore}</h5>
          <table>
          <tr>
            <td>Nome:</td><td>{$dati_utente.nome}</td>
          </tr><tr>
            <td>Cognome:</td><td>{$dati_utente.cognome}</td>
          </tr><tr>
            <td>Via:</td><td>{$dati_utente.via}</td>
          </tr><tr>
            <td>CAP:</td><td>{$dati_utente.CAP}</td>
          </tr><tr>
            <td>Citt&agrave;:</td><td>{$dati_utente.citta}</td>
          </tr></table>
          <table id="carrello">
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Subtotale</th></tr>
            {section name=i loop=$carrello.oggetti}
            <tr><th scope="row">{$carrello.oggetti[i].titolo}</th>
                <td>{$carrello.oggetti[i].autore}</td>
                <td id="numero">{$carrello.oggetti[i].quantita}</td>
                <td id="numero">{$carrello.oggetti[i].prezzo|string_format:"%.2f"}</td>
                {assign var="sub" value="`$carrello.oggetti[i].quantita*$carrello.oggetti[i].prezzo`"}
                <td id="numero">{$sub|string_format:"%.2f"}</td></tr>
            {/section}
            <tr><th scope="row" id="numero" colspan="3"></th><th scope="col">Totale:</th><td id="numero">{$carrello.totale|string_format:"%.2f"}</td></tr>
          </table>
          <form action="index.php" method="post">
            <input type="hidden" name="controller" value="ordine" />
            <input id="button" type="submit" name="task" value="Conferma" />
          </form>
        </div>
        <div class="corner-content-1col-bottom"></div>
