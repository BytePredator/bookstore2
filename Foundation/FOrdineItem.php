<?php
/**
 * @access public
 * @package Foundation
 */
class FOrdineItem extends Fdb {
    public function __construct() {
        $this->_table='ordineitem';
        $this->_key='id';
        $this->_auto_increment=true;
        $this->_return_class='EOrdineItem';
        USingleton::getInstance('Fdb');
    }
    public function store(EOrdineItem & $item) {
        $libro=$item->getLibro();
        $item->libroISBN=$libro->ISBN;
        $id = parent::store($item);
        $item->id=$id;
    }
}

?>
