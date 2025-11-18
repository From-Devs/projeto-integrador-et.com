<?php 
// Controllers/CustomizacaoModel.php
require_once __DIR__ . "/../Models/CustomizacaoModel.php";

require_once __DIR__ . "/../Models/DestaqueModel.php";
//require_once __DIR__ . "/../Models/LancamentoModel.php";
class CustomizacaoController(){
    // model juntando toda em unicico arquivo
    private ProdutoDestaque $DestaqueModel
    private CarouselModel $CarouselModel
    // private ------------- $LansamenModel
    private CoresSubModel $CoreSubsModel

    public function __construct() {
        $this->DestaqueModel = new DestaqueModel();
        $this->CarouselModel = new CoresSubModel();
        // $this->LansamenModel = new LancamentoModel();
        $this->CoreSubsModel = new CoresSubModel();;
    }

    public function Create_Carousel(int $id,array $data):array {
        $res =  $CarouselModel->create($id,$data)
        return $res
    }
    public function Create_Destaque(int $id,array $data): array {
        $res =  $DestaqueModel->create($id,)
        return $res
    }
    // public function Create_Lancamentos() { "
    
    // }
    public function Create_CoresSubs() {
        $res =  $CoreSubsModel->create($id,)
        return $res
    }

}
?>