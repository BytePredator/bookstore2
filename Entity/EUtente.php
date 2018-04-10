<?php

/**
 * @access public
 * @package Entity
 */
class EUtente {
    public $nome;
    public $cognome;
    public $username;
    public $password;
    public $email;
    public $via;
    public $CAP;
    public $citta;
    public $codice_attivazione;
    public $stato='non_attivo';
    /**
     * @AssociationType Entity.EOrdine
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    public $_ordini = array();
    /**
     * @access public
     * @return float
     * @ReturnType float
     */
    public function spesaStoricaTotale() {
        // Not yet implemented
    }

    /**
     * @access public
     */
    public function generaCodiceAttivazione() {
        $this->codice_attivazione=mt_rand();
    }

    /**
     * @access public
     * @param Entity.EOrdine aOrdine
     * @ParamType aOrdine Entity.EOrdine
     */
    public function addOrdine(EOrdine $aOrdine) {
        $this->_ordini[]=$aOrdine;
    }

    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function getOrdini() {
        return $this->_ordini;
    }
    /**
     * @access public
     * @return array()
     * @ReturnType array()
     */
    public function getAccountAttivo() {
        if ($this->stato=='attivo')
            return true;
        else
            return false;
    }

    public function getCodiceAttivazione() {
        return $this->codice_attivazione;
    }
}
?>