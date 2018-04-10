<?php
/**
 * @access public
 * @package Foundation
 */
class FCartaCredito extends Fdb{
    public function __construct() {
        $this->_table='cartacredito';
        $this->_key='numero';
        $this->_return_class='ECartaCredito';
        parent::setLink(USingleton::getInstance('Fdb')->getLink());
    }
}

?>
