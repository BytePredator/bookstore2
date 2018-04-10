<?php
/**
 * @access public
 * @package Foundation
 */
class FLibro extends Fdb {
    protected $DB;
    public function __construct() {
        $this->_table='libro';
        $this->_key='ISBN';
        $this->_return_class='ELibro';
        parent::setLink(USingleton::getInstance('Fdb')->getLink());
    }
    public function store( $libro) {
        parent::store($libro);
        $FCommento=new FCommento();
        $arrayCommentiEsistenti=$FCommento->loadCommenti($libro->ISBN);
        if ($arrayCommentiEsistenti!=false) {
            foreach ($arrayCommentiEsistenti as $itemCommento) {
                $FCommento->delete($itemCommento);
            }
        }
        $arrayCommenti=$libro->getCommenti();
        foreach ($arrayCommenti as &$commento) {
            $commento->libroISBN=$libro->ISBN;
            $FCommento->store($commento);
        }
    }
    public function load ($key) {
        $libro=parent::load($key);
        $FCommento=new FCommento();
        $arrayCommenti=$FCommento->loadCommenti($libro->ISBN);
        $libro->_commento=$arrayCommenti;
        return $libro;
    }

    public function delete( & $libro) {
        $arrayCommenti=& $libro->getCommenti();
        $FCommento= new FCommento();
        foreach ($arrayCommenti as &$commento) {
            $FCommento->delete($commento);
        }
        parent::delete($libro);
    }

     /**
     * Seleziona sul database le diverse categorie esistenti per i vari libri
     *
     * @return array
     */
    public function getCategorie(){
        $query='SELECT DISTINCT `categoria` ' .
                'FROM `libro` ';
        $this->query($query);
        return $this->getResultAssoc();
    }

}

?>
