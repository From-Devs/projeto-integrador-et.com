<?php

require_once __DIR__ . "/../Models/Dashboard_ADM_Model.php";

class Dashboard_ADM_Controller {

     private $Dashboard_ADM_Model;

    public function __construct() {
        $this->Dashboard_ADM_Model = new Dashboard_ADM_Model();
    }

    public function getLucroTotal() {
        return $this->Dashboard_ADM_Model->getLucroTotal();
    }

}