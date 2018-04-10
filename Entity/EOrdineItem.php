<?php


/**
 * @access public
 * @package Entity
 */
class EOrdineItem {
    /**
     *
     * @var int
     */
    public $id;
    /**
     *
     * @var int
     */
    public $quantita=1;
    /**
     * @AssociationType Entity.ELibro
     * @AssociationMultiplicity 1
     */
    public $_libro;
    /**
     *
     * @param ELibro $libro
     */
    public function setLibro(ELibro $libro) {
        $this->_libro=$libro;
    }
    /**
     * Restituisce l'oggetto ELibro
     *
     * @return ELibro
     */
    public function getLibro() {
        return $this->_libro;
    }
}
?>