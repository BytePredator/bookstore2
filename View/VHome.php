<?php
/**
 * File VHome.php contenente la classe VHome
 *
 * @package view
 */
/**
 * Classe VHome, estende la classe view e gestisce la visualizzazione e formattazione del sito, inoltre imposta i principali contenuti della pagina, suddivisi in contenuti principali (main_content) e contenuti della barra laterale (side_content)
 *
 * @package View
 */
class VHome extends View {
    /**
     * @var string $_main_content
     */
    private $_main_content;
    /**
     * @var array $_main_button
     */
    private $_main_button=array();
    /**
     * @var string $_side_content
     */
    private $_side_content;
    /**
     * @var array $_side_button
     */
    private $_side_button=array();
    /**
     * @var string $_layout
     */
    private $_layout='default';
    /**
     * Aggiunge il modulo di login nella pagina principale, per gli utenti non autenticato
     */
    public function aggiungiModuloLogin() {
        $VRegistrazione=USingleton::getInstance('VRegistrazione');
        $VRegistrazione->setLayout('default');
        $modulo_login=$VRegistrazione->processaTemplate();
        $this->_side_content.=$modulo_login;

    }
    /**
     * Assegna il contenuto al template e lo manda in output
     */
    public function mostraPagina() {
        $this->assign('right_content',$this->_side_content);
        $this->assign('tasti_laterali',$this->_side_button);
        $this->display('home_'.$this->_layout.'.tpl');
    }
    /**
     * imposta il contenuto principale alla variabile privata della classe
     */
    public function impostaContenuto($contenuto) {
        $this->_main_content=$contenuto;
    }
    /**
     * Restituisce il controller passato tramite richiesta GET o POST
     *
     * @return mixed
     */
    public function getController() {
        if (isset($_REQUEST['controller']))
            return $_REQUEST['controller'];
        else
            return false;
    }
    /**
     * Imposta la pagina per gli utenti registrati/autenticati
     */
    public function impostaPaginaRegistrato() {
        $session=USingleton::getInstance('USession');
        $this->assign('title','Bookstore');
        $nome_cognome=$session->leggi_valore('nome_cognome');
        $this->assign('content_title','Benvenuto '.$nome_cognome);
        $this->assign('main_content',$this->_main_content);
        $this->assign('menu',$this->_main_button);
        $this->aggiungiTastoLogout();
    }
    /*
     * imposta la pagina per gli utenti non registrati/autenticati
     */
    public function impostaPaginaGuest() {
        $this->assign('title','Bookstore');
        $this->assign('content_title','Benvenuto ospite');
        $this->assign('main_content',$this->_main_content);
        $this->assign('menu',$this->_main_button);
        $this->aggiungiModuloLogin();
        $this->aggiungiTastoRegistrazione();
    }
    /**
     * aggiunge il tasto logout al menu laterale
     */
    public function aggiungiTastoLogout() {
        $tasto_logout=array();
        $tasto_logout[]=array('testo' => 'Logout', 'link' => '?controller=registrazione&task=esci');
        $this->_side_button=array_merge($tasto_logout,$this->_side_button);
    }
    /**
     * aggiunge il tasto per la registrazione nel menu laterale (per gli utenti non autenticati)
     */
    public function aggiungiTastoRegistrazione() {
        $menu_registrazione=array();
        $menu_registrazione[]=array('testo' => 'Attivati', 'link' => '?controller=registrazione&task=attivazione');
        $this->_side_button[]=array_merge(array('testo' => 'Registrati', 'link' => '?controller=registrazione&task=registra', 'submenu' => $menu_registrazione),$this->_side_button);
    }
    /**
     * imposta i tasti per le categorie nel menu principale
     */
    public function impostaTastiCategorie($categorie){
        $sotto_tasti=array();
        $tasti=array();
        foreach ($categorie as $categoria){
            $sotto_tasti[]=array('testo' => $categoria['categoria'], 'link' => '?controller=ricerca&task=lista&categoria='.$categoria['categoria']);
        }
        $tasti[]=array('testo' => 'Categorie', 'link' => '#', 'submenu' => $sotto_tasti);
        $this->_main_button=$tasti;
    }
}

?>