<?php
/**
 * @access public
 * @package Entity
 */
class ECartaCredito {
    public $nome_titolare;
    public $cognome_titolare;
    public $data_scadenza;
    public $numero;
    public $ccv;

    /**
     * Controlla se la carta di credito è scaduta
     * @access public
     * @return boolean
     */
    public function eScaduta() {
        $date2 = time();
        $dateArr = explode("-",$this->data_scadenza);
        $date1Int = mktime(0,0,0,$dateArr[1],$dateArr[2],$dateArr[0]) ;
        if (($date1Int-$date2)<0)
            return true;
        else
            return false;
    }
    /**
     * Imposta la data di scadenza nel formato AAAA-MM-DD
     * @access public
     * @param $data String
     */
    public function setDataScadenza($data) {
        $anno='20'.substr($data, 3);
        $mese=substr($data, 0, 2);
        $giorno='01';
        $this->data_scadenza="$anno-$mese-$giorno";
    }
}
?>