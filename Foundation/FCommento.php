<?php
/**
 * @access public
 * @package Foundation
 */
class FCommento extends Fdb {
    public function __construct() {
        $this->_table='commento';
        $this->_key='id';
        $this->_auto_increment=true;
        $this->_return_class='ECommento';
        parent::setLink(USingleton::getInstance('Fdb')->getLink());
    }

    public function store( $object){
        $id = parent::store($object);
        $object->id=$id;
    }

    public function loadCommenti($libroISBN){
        $parametri=array();
        $parametri[]=array('libroISBN','=',$libroISBN);
        $arrayCommenti=parent::search($parametri);
        return $arrayCommenti;
    }
}

?>
