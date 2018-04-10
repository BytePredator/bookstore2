<?php
/**
 * @access public
 * @package Foundation
 */
class FOrdine extends Fdb{
    public function __construct() {
        $this->_table='ordine';
        $this->_key='id';
        $this->_auto_increment=true;
        $this->_return_class='EOrdine';
        parent::setLink(USingleton::getInstance('Fdb')->getLink());
    }
    public function store(EOrdine & $ordine){
        $FCartaCredito=new FCartaCredito();
        $FCartaCredito->store($ordine->_cartacredito);
        $ordine->cartaCreditoNumero=$ordine->_cartacredito->numero;
        $ordine->utenteusername=$ordine->_utente->username;
        $FOrdineItem=new FOrdineItem();
        $id = parent::store($ordine);
        foreach ($ordine->_item as &$item){
            $item->ordineID=$id;
            $FOrdineItem->store($item);
        }
        $ordine->id=$id;
    }
    public function load($key){
        $ordine=parent::load($key);
        $FUtente=new FUtente();
        $utente=$FUtente->load($ordine->utenteusername);
        $ordine->setUtente($utente);
        $Fcarta=new FCartaCredito();
        $carta=$Fcarta->load($ordine->cartaCreditoNumero);
        $ordine->setCartaCredito($carta);
        $id = parent::store($ordine);
        $ordine->id=$id;
        return $ordine;
    }
}

?>
