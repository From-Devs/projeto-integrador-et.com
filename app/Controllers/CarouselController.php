<?php
// controller/CaroselController
require_once __DIR__ . "/../Models/CarouselModel.php";

class CarouselController{
  protected $carouselmodel;
  public function __construct(){
    $this->carouselmodel = new CarouselModel;
  };
  public function index(){
    echo "foi";
  };
};
$kid = new CarouselController()
$teste = $kid->index();