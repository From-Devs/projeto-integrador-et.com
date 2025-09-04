<?php
class BaseController {
    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        return $this->model->getAll();
    }

    public function show($id) {
        return $this->model->getById($id);
    }

    public function store($dados) {
        return $this->model->create($dados);
    }

    public function update($id, $dados) {
        return $this->model->update($id, $dados);
    }

    public function destroy($id) {
        return $this->model->delete($id);
    }
}
