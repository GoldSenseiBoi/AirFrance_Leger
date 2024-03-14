<?php
require_once 'modeles/Avion.php';

class AvionController {
    public function list() {
        $avions = Avion::getAll();
        require 'vues/avion_list.php';
    }
}
?>
