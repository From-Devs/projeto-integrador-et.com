<?php
require_once __DIR__ . "/BaseController.php";
require_once __DIR__ . '/../Models/LancamentoModel.php';
require_once __DIR__ . '/../Models/CoresSubModel.php';

class LancamentosController {
    private $lancamentosModel;
    private $coresModel;

    public function __construct() {
        $this->lancamentosModel = new Lancamentos();
        $this->coresModel = new CoresSubModel();
    }


    public function getAll() {
        $dados = [
            'lancamentos' => $this->lancamentosModel->getAll(),
        ];
        return $dados['lancamentos'];
    }

    public function getByid() {
        $lancamentos = $this->lancamentosModel->getElementById($id);
        $cor = $lancamentos ? $this->coresModel->getElementById($lancamentos['id_coresSubs']) : null;

        $dados = [
            'lancamentos' => $lancamentos,
            'cor' => $cor
        ];
    }

    public function createLancamentos(int $id, Array $data) {
        return $this->lancamentosModel->create($data);
    }

    

    public function update(int $id_lancamento, array $data): array {
        try {
            $ok = $this->lancamentosModel->update($id_lancamento, $data);

            if (!$ok) {
                return [
                    'status' => 'error',
                    'message' => 'Falha ao atualizar os Lançamentos.'
                ];
            }

            return [
                'status' => 'success',
                'message' => 'Lançamentos atualizados com sucesso.'
            ];
        } catch (Exception $e) {
            error_log("[LancamentosController] Erro update: " . $e->getMessage());
            return [
                'status' => 'error',
                'message' => 'Erro ao atualizar os Lançamentos.'
            ];
        }
    }

    public function editaLancamentos(int $id, array $data) {
        return $this->lancamentosModel->update($id, $data);
    }

    public function deleteLancamentos(int $id) {
        return $this->lancamentosModel->remove($id);
    }

    public function updateCoresPersonalizadas(int $id_lancamento, array $data) {
        return $this->lancamentosModel->updateCoresPersonalizadas($id_lancamento, $data);
    }

    public function getAllUniqueCores() {
        return $this->lancamentosModel->getAllUniqueCores();
    }
}