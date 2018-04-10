<?php
/**
 * @access public
 * @package Controller
 */
class COrdine {
    /**
     * Variabile contenente lo stato attuale dell'ordine/carrello
     *
     * @var EOrdine
     */
    private $_carrello;
    /**
     * Costruttore, legge la variabile di sessione 'carrello'
     */
    public function __construct() {
        $session=USingleton::getInstance('USession');
        $tmp_carrello=$session->leggi_valore('carrello');
        if ($tmp_carrello!=false)
            $this->_carrello=unserialize($tmp_carrello);
    }
    /**
     * Aggiunge un libro al carrello
     *
     * @return string
     */
    public function aggiungi() {
        $view = USingleton::getInstance('VOrdine');
        $id_libro=$view->getIdLibro();
        $aggiorna=false;
        $FLibro=new FLibro();
        $libro=$FLibro->load($id_libro);
        $ordineItem=new EOrdineItem();
        $ordineItem->setLibro($libro);
        if ($this->_carrello==false)
            $this->_carrello=new EOrdine();
        $this->_carrello->addItem($ordineItem);
        $session=USingleton::getInstance('USession');
        $session->imposta_valore('carrello',serialize($this->_carrello));
        return $this->contenuto();
    }
    /**
     * Aggiorna il carrello, se la quantità di un libro viene impostata a 0, il libro viene eliminato dal carrello
     *
     * @return string
     */
    public function aggiorna() {
        $view = USingleton::getInstance('VOrdine');
        $quantita=$view->getArrayQuantita();
        debug ($quantita);

        if ($quantita!=false) {
            for($i=0; $i<count($quantita); $i++) {
                if ($quantita[$i+1]==0)
                    $this->_carrello->removeItem($i);
                else {
                    $items=array();
                    $items=$this->_carrello->getItems();
                    $items[$i]->quantita=$quantita[$i+1];
                }
            }
        }
        $session=USingleton::getInstance('USession');
        $session->imposta_valore('carrello',serialize($this->_carrello));
        return $this->contenuto();
    }
    /**
     * Mostra il contenuto del carrello
     *
     * @return string
     */
    public function contenuto() {
        $view = USingleton::getInstance('VOrdine');
        $session=USingleton::getInstance('USession');
        if ($session->leggi_valore('username')!=false)
            $view->setLayout('carrello_registrato');

        if ($this->_carrello!=false) {
            $items=$this->_carrello->getItems();
            $dati['oggetti']=array();
            $dati['totale']=$this->_carrello->getPrezzoTotale();
            foreach ($items as $item) {
                $dati['oggetti'][]=array_merge(get_object_vars($item->getLibro()), array('quantita' => $item->quantita));
            }
            debug($dati);
            $view->impostaDati('dati',$dati);
        }
        return $view->processaTemplate();
    }
    /**
     * Mostra il repilogo dei libri che si stanno per ordinare
     *
     * @return string
     */
    public function riepilogo() {
        $view = USingleton::getInstance('VOrdine');
        $session = USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        $FUtente=new FUtente();
        $utente=$FUtente->load($username);
        $this->_carrello->setUtente($utente);
        $dati_utente=get_object_vars($utente);
        $view->impostaDati('dati_utente', $dati_utente);
        $items=$this->_carrello->getItems();
        $carrello['oggetti']=array();
        $carrello['totale']=$this->_carrello->getPrezzoTotale();
        foreach ($items as $item) {
            $carrello['oggetti'][]=array_merge(get_object_vars($item->getLibro()), array('quantita' => $item->quantita));
        }
        $view->impostaDati('carrello', $carrello);
        $view->setLayout('riepilogo');
        $session->imposta_valore('carrello',serialize($this->_carrello));
        return $view->processaTemplate();
    }
    /**
     * Svuota il carrello e lo cancella dalla sessione
     *
     * @return string
     */
    public function svuota() {
        $session=USingleton::getInstance('USession');
        $session->cancella_valore('carrello');
        $this->_carrello=false;
        return $this->contenuto();
    }
    /**
     * Invia un email di conferma all'utente che ha effettuato il pagamento
     *
     * @return boolean
     */
    public function emailConfermaOrdine(EOrdine $ordine) {
        global $config;
        $view=USingleton::getInstance('VOrdine');
        $view->setLayout('email_conferma');
        $utente=$ordine->getUtente();
        $dati_utente=get_object_vars($utente);
        $view->impostaDati('dati_utente',$dati_utente);
        $items=$ordine->getItems();
        $carrello['libri']=array();
        $carrello['totale']=$this->_carrello->getPrezzoTotale();
        foreach ($items as $item) {
            $carrello['libri'][]=array_merge(get_object_vars($item->getLibro()), array('quantita' => $item->quantita));
        }
        $view->impostaDati('ordine',$carrello);
        $corpo_email=$view->processaTemplate();
        $email=USingleton::getInstance('UEmail');
        return $email->invia_email($utente->email,$utente->nome.' '.$utente->cognome,'Conferma ordine bookstore',$corpo_email,'Contenuto non visibile, necessario client che supporti l\'HTML',true);
    }
    /**
     * Salva l'ordine nel database.
     *
     * @return string
     */
    public function salvaOrdine() {
        $view = USingleton::getInstance('VOrdine');
        $dati_pagamento=$view->getDatiPagamento();
        $carta_credito= new ECartaCredito();
        $carta_credito->ccv=$dati_pagamento['ccv'];
        $carta_credito->numero=$dati_pagamento['numero_carta'];
        $carta_credito->nome_titolare=$dati_pagamento['nome_titolare'];
        $carta_credito->cognome_titolare=$dati_pagamento['cognome_titolare'];
        $carta_credito->setDataScadenza($dati_pagamento['scadenza']);
        debug($carta_credito);
        $this->_carrello->setCartaCredito($carta_credito);
        $FOrdine=new FOrdine();
        $this->_carrello->setData(date('d-m-Y'));
        $FOrdine->store($this->_carrello);
        $this->emailConfermaOrdine($this->_carrello);
        $view->setLayout('termine');
        $session=USingleton::getInstance('USession');
        $session->cancella_valore('carrello');
        return $view->processaTemplate();
    }
    /**
     * Mostra il modulo per il pagamento
     *
     */
    public function moduloPagamento() {
        $view = USingleton::getInstance('VOrdine');
        $view->setLayout('pagamento');
        return $view->processaTemplate();
    }
    /**
     * Smista le richieste ai vari metodi
     * 
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VOrdine');
        switch ($view->getTask()) {
            case 'contenuto':
                return $this->contenuto();
            case 'Aggiungi al Carrello':
                return $this->aggiungi();
            case 'Aggiorna Carrello':
                return $this->aggiorna();
            case 'Svuota':
                return $this->svuota();
            case 'Ordina':
                return $this->riepilogo();
            case 'Conferma':
                return $this->moduloPagamento();
            case 'Effettua il pagamento':
                return $this->salvaOrdine();
        }
    }
}

?>
