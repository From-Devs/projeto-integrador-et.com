<?php
// Controllers/CustomizacaoController.php

require_once __DIR__ . "/../Models/products.php";
require_once __DIR__ . "/../Models/DestaqueModel.php";
require_once __DIR__ . "/../Models/CarouselModel.php";
require_once __DIR__ . "/../Models/CoresSubModel.php";
require_once __DIR__ . "/../Models/LancamentoModel.php";

class CustomizacaoController {
    private Products $produtoModel;
    private Lancamentos $lancamentoModel;
    private ProdutoDestaque $destaqueModel;
    private CarouselModel $carouselModel;
    private CoresSubModel $coresSubsModel;

    public function __construct() {
        $this->lancamentoModel = new Lancamentos();
        $this->produtoModel = new Products();
        $this->destaqueModel = new ProdutoDestaque();
        $this->carouselModel = new CarouselModel();
        $this->coresSubsModel = new CoresSubModel();
    }

    // Retorna todos os registros
    public function index(): array {
        return [
            "carousel" => $this->carouselModel->getAll(),
            "lancamento" => $this->lancamentoModel->getAll(),
            "destaque" => $this->destaqueModel->getAll(),
            "produtos" => $this->produtoModel->getAllProdutos(),
            "coresSub" => $this->coresSubsModel->getAll()
        ];
    }

    // Deletar carousel
    public function deleteCarousel(int $id) {
        return $this->carouselModel->remove($id);
    }

    // Criar destaque
    // CustomizacaoController.php

    // Criar destaque
    public function createDestaque(array $data): array {
        try {
            // 1) Verificar se já existe destaque
            $existe = $this->destaqueModel->getDestaque();
            
            if (!$existe) {
                // -----------------------------------
                // NÃO existe → CRIAR novo destaque
                // -----------------------------------
                $resultado = $this->destaqueModel->create($data);
                return ['action' => 'create', 'result' => $resultado, 'status' => 'sucesso']; // Adicione 'status'
            }
            
            // -----------------------------------
            // Já existe → UPDATE
            // -----------------------------------
            $id_destaque = (int)$existe['id_prodDestaque'];
            $resultado = $this->destaqueModel->update($id_destaque, $data);

            return ['action' => 'update', 'result' => $resultado, 'status' => 'sucesso']; // Adicione 'status'

        } catch (\Throwable $e) { // Captura erros fatais e exceções
            error_log("[DESTAQUE] Erro Fatal ao salvar: " . $e->getMessage() . " - Trace: " . $e->getTraceAsString());
            
            // Retorna uma resposta JSON que o JavaScript consegue ler corretamente como erro
            return [
                'status' => 'erro',
                'msg' => 'Erro interno ao processar o destaque. Verifique os logs do servidor.'
            ];
        }
    }

    // Deletar destaque
    public function deleteDestaque(int $id) {
        return $this->destaqueModel->remove($id);
    }

    // Criar coresSubs
    public function createCoresSubs(int $id, array $data): array {
        $coresSubs = $this->coresSubsModel->create($id, $data);
        return ['coresSubs' => $coresSubs];
    }

    // Deletar coresSubs
    public function deleteCoresSubs(int $id) {
        return $this->coresSubsModel->remove($id);
    }
    // Criar lancamentos
    public function createLancamento(int $id, array $data): array {
        $lancamento = $this->lancamentoModel->create($id, $data);
        return ['lancamento' => $lancamento];
    }
    // Deletar lancamentos
    public function deleteLancamento(int $id) {
        return $this->lancamentoModel->remove($id);
    }

    public function processarLancamentos(array $lancamentos): array {
        $resultados = [];
        foreach ($lancamentos as $data) {
            $id_lancamento = (int)($data['id_lancamento'] ?? 0); // O ID do registro 'lancamento'
            
            // Chamada ao Model para criação/atualização
            $resultado = $this->lancamentoModel->Update($id_lancamento, $data); 
            $resultados[] = $resultado;
        }
        return ['status' => 'sucesso', 'resultados' => $resultados];
    }

    // Controllers/CustomizacaoController.php (Função processarCarousel)

    public function processarCarousel(array $carrosseis): array {
        $resultados = [];
        
        foreach ($carrosseis as $data) {
            $id_carousel = (int)($data['id_carousel'] ?? 0); // Garante que é int

            // O id_carousel nunca deve ser 0 em um UPDATE, mas o Model vai tratar.
            if ($id_carousel === 0) { 
                // Se o ID for 0, você deveria chamar um CREATE. Por enquanto, ignore.
                $resultados[] = false;
                continue; 
            }

            try {
                // Chamada ao Model para UPDATE
                $resultado = $this->carouselModel->update($id_carousel, $data); 
                $resultados[] = $resultado;
            } catch (\Exception $e) {
                // Logar se o UPDATE lançar uma exceção não tratada no Model
                error_log("[CarouselController] Erro ao processar o Carousel ID {$id_carousel}: " . $e->getMessage());
                $resultados[] = false;
            }
        }
        return ['status' => 'sucesso', 'resultados' => $resultados];
    }

}

$conn = new CustomizacaoController();

$res = $conn->index();
