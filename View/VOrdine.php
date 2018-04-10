<?php
/**
 * File VHome.php contenente la classe VHome
 *
 * @package view
 */
/**
 * Classe VHome, estende la classe view del package System e gestisce la visualizzazione e formattazione del sito, inoltre imposta i principali contenuti della pagina, suddivisi in contenuti principali (main_content) e contenuti della barra laterale (side_content)
 *
 * @package View
 */
class VOrdine extends View {
    /**
     *
     * @var string $_layout
     */
    private $_layout='carrello';
    /**
     * restituisce il numero della pagina (utilizzato nella visualizzazione dei libri) passato per GET o POST
     * @return int
     */
    public function getPage() {
        if (isset($_REQUEST['page'])) {
            return $_REQUEST['page'];
        } else
            return 0;
    }
    /**
     * Restituisce l'id del libro passato per GET o POST
     *
     * @return mixed
     */
    public function getIdLibro() {
        if (isset($_REQUEST['id_libro'])) {
            return $_REQUEST['id_libro'];
        } else
            return false;
    }
    /**
     * Processa il layout scelto nella variabile _layout
     *
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('ordine_'.$this->_layout.'.tpl');
    }
    /**
     * Imposta i dati nel template identificati da una chiave ed il relativo valore
     *
     * @param string $key
     * @param mixed $valore
     */
    public function impostaDati($key,$valore) {
        $this->assign($key,$valore);
    }
    /**
     * Restituisce il nome del task richiesto tramite GET o POST
     *
     * @return mixed
     */
    public function getTask() {
        if (isset($_REQUEST['task']))
            return $_REQUEST['task'];
        else
            return false;
    }
    /**
     * Restituisce l'array delle quantità per gli oggetti nel carrello
     *
     * @return mixed
     */
    public function getArrayQuantita() {
        if (isset($_REQUEST['quantita'])) {
            return $_REQUEST['quantita'];
        } else
            return false;
    }
    /**
     * Imposta il layout
     *
     * @param string $layout
     */
    public function setLayout($layout) {
        $this->_layout=$layout;
    }
    /**
     * restituisce i dati relativi alla carta di credito
     *
     * @return array
     */
    public function getDatiPagamento() {
        $dati_richiesti=array('numero_carta','nome_titolare','cognome_titolare','scadenza','ccv');
        $dati=array();
        foreach ($dati_richiesti as $dato) {
            if (isset($_REQUEST[$dato]))
                $dati[$dato]=$_REQUEST[$dato];
        }
        return $dati;
    }


}

?>