<?php
// app/Controllers/ProdutoController.php

require_once __DIR__ . '/../Models/ProdutoModel.php';

/**
 * Classe ProdutoController
 * Gerencia requisições relacionadas a produtos, interagindo com o ProdutoModel e views.
 */
class ProdutoController
{
    private ProdutoModel $model;

    public function __construct()
    {
        $this->model = new ProdutoModel();
    }

    public function criarProduto(array $data, array $files = []): array
    {
        // Mapear campos das views para o modelo
        $data = $this->mapearDados($data);

        $requiredFields = ['nome', 'marca', 'preco', 'qtdEstoque', 'id_subCategoria', 'corPrincipal'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                return [
                    'success' => false,
                    'message' => "O campo '$field' é obrigatório.",
                    'id' => null
                ];
            }
        }

        // Sanitizar dados
        $data['nome'] = filter_var($data['nome'], FILTER_SANITIZE_STRING);
        $data['marca'] = filter_var($data['marca'], FILTER_SANITIZE_STRING);
        $data['descricaoBreve'] = filter_var($data['descricaoBreve'] ?? '', FILTER_SANITIZE_STRING);
        $data['descricaoTotal'] = filter_var($data['descricaoTotal'] ?? '', FILTER_SANITIZE_STRING);
        $data['preco'] = filter_var($data['preco'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $data['qtdEstoque'] = filter_var($data['qtdEstoque'], FILTER_SANITIZE_NUMBER_INT);
        $data['precoPromo'] = filter_var($data['precoPromo'] ?? 0, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $data['fgPromocao'] = filter_var($data['fgPromocao'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
        $data['id_subCategoria'] = filter_var($data['id_subCategoria'], FILTER_SANITIZE_NUMBER_INT);
        $data['id_associado'] = filter_var($data['id_associado'] ?? null, FILTER_SANITIZE_NUMBER_INT);
        $data['corPrincipal'] = filter_var($data['corPrincipal'], FILTER_SANITIZE_STRING);
        $data['hex1'] = filter_var($data['hex1'] ?? null, FILTER_SANITIZE_STRING);
        $data['hex2'] = filter_var($data['hex2'] ?? null, FILTER_SANITIZE_STRING);

        if ($data['preco'] < 0) {
            return [
                'success' => false,
                'message' => 'O preço deve ser um número positivo.',
                'id' => null
            ];
        }
        if ($data['qtdEstoque'] < 0) {
            return [
                'success' => false,
                'message' => 'O estoque deve ser um número não negativo.',
                'id' => null
            ];
        }

        return $this->model->create($data, $files);
    }

    public function editarProduto(int $id, array $data, array $files = []): array
    {
        // Mapear campos das views para o modelo
        $data = $this->mapearDados($data);

        $requiredFields = ['nome', 'marca', 'preco', 'qtdEstoque', 'id_subCategoria', 'corPrincipal'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                return [
                    'success' => false,
                    'message' => "O campo '$field' é obrigatório."
                ];
            }
        }

        // Sanitizar dados
        $data['nome'] = filter_var($data['nome'], FILTER_SANITIZE_STRING);
        $data['marca'] = filter_var($data['marca'], FILTER_SANITIZE_STRING);
        $data['descricaoBreve'] = filter_var($data['descricaoBreve'] ?? '', FILTER_SANITIZE_STRING);
        $data['descricaoTotal'] = filter_var($data['descricaoTotal'] ?? '', FILTER_SANITIZE_STRING);
        $data['preco'] = filter_var($data['preco'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $data['qtdEstoque'] = filter_var($data['qtdEstoque'], FILTER_SANITIZE_NUMBER_INT);
        $data['precoPromo'] = filter_var($data['precoPromo'] ?? 0, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $data['fgPromocao'] = filter_var($data['fgPromocao'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
        $data['id_subCategoria'] = filter_var($data['id_subCategoria'], FILTER_SANITIZE_NUMBER_INT);
        $data['id_associado'] = filter_var($data['id_associado'] ?? null, FILTER_SANITIZE_NUMBER_INT);
        $data['corPrincipal'] = filter_var($data['corPrincipal'], FILTER_SANITIZE_STRING);
        $data['hex1'] = filter_var($data['hex1'] ?? null, FILTER_SANITIZE_STRING);
        $data['hex2'] = filter_var($data['hex2'] ?? null, FILTER_SANITIZE_STRING);

        if ($data['preco'] < 0) {
            return [
                'success' => false,
                'message' => 'O preço deve ser um número positivo.'
            ];
        }
        if ($data['qtdEstoque'] < 0) {
            return [
                'success' => false,
                'message' => 'O estoque deve ser um número não negativo.'
            ];
        }

        return $this->model->editarProduto($id, $data, $files);
    }

    public function removerProduto(int $id): array
    {
        if ($id <= 0) {
            return [
                'success' => false,
                'message' => 'ID do produto inválido.'
            ];
        }

        return $this->model->remove($id);
    }

    public function getProduto(int $id): ?array
    {
        if ($id <= 0) {
            return null;
        }

        return $this->model->getById($id);
    }

    public function listarTodos(string $ordem = '', string $pesquisa = ''): array
    {
        $pesquisa = filter_var($pesquisa, FILTER_SANITIZE_STRING);
        $ordem = filter_var($ordem, FILTER_SANITIZE_STRING);

        return $this->model->getAll($ordem, $pesquisa);
    }

    public function getAllSubcategorias(): array
    {
        return $this->model->getAllSubcategorias();
    }

    /**
     * Mapeia os nomes dos campos das views para os nomes esperados pelo modelo.
     * @param array $data Dados recebidos do formulário.
     * @return array Dados mapeados.
     */
    private function mapearDados(array $data): array
    {
        return [
            'nome' => $data['nome'] ?? '',
            'marca' => $data['marca'] ?? '',
            'descricaoBreve' => $data['breveDescricao'] ?? $data['descricaoBreve'] ?? null,
            'descricaoTotal' => $data['caracteristicasCompleta'] ?? $data['descricaoTotal'] ?? null,
            'preco' => $data['preco'] ?? 0,
            'precoPromo' => $data['precoPromocional'] ?? $data['precoPromo'] ?? 0,
            'fgPromocao' => $data['fgPromocao'] ?? 0,
            'qtdEstoque' => $data['qtdEstoque'] ?? 0,
            'id_subCategoria' => $data['subCategoria'] ?? $data['id_subCategoria'] ?? null,
            'corPrincipal' => $data['corPrincipal'] ?? '',
            'hex1' => $data['deg1'] ?? $data['hex1'] ?? null,
            'hex2' => $data['deg2'] ?? $data['hex2'] ?? null,
            'id_associado' => $data['id_associado'] ?? null
        ];
    }

    public function index(string $ordem = '', string $pesquisa = ''): void
    {
        session_start();
        $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Associado';
        $produtos = $this->listarTodos($ordem, $pesquisa);
        $subcategorias = $this->getAllSubcategorias();
        $resultado = paginar($produtos, 7); // Usar função de paginação do componente
        $viewPath = __DIR__ . '/../Views/produtos/index.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            echo "Erro: Arquivo de view 'index.php' não encontrado em '$viewPath'.";
        }
    }

    public function criarForm(): void
    {
        session_start();
        $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Associado';
        $subcategorias = $this->getAllSubcategorias();
        $viewPath = __DIR__ . '/../Views/produtos/create.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            echo "Erro: Arquivo de view 'create.php' não encontrado em '$viewPath'.";
        }
    }

    public function criar(array $data, array $files): void
    {
        $result = $this->criarProduto($data, $files);
        $acao = 'CadastrarProduto';
        $status = $result['success'] ? 'sucesso' : 'erro';
        header("Location: /produtos?status=$status&acao=$acao");
        exit;
    }

    public function editarForm(int $id): void
    {
        session_start();
        $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Associado';
        $produto = $this->getProduto($id);
        $subcategorias = $this->getAllSubcategorias();
        if ($produto) {
            $viewPath = __DIR__ . '/../Views/produtos/edit.php';
            if (file_exists($viewPath)) {
                require_once $viewPath;
            } else {
                header('HTTP/1.1 500 Internal Server Error');
                echo "Erro: Arquivo de view 'edit.php' não encontrado em '$viewPath'.";
            }
        } else {
            header('HTTP/1.1 404 Not Found');
            echo 'Produto não encontrado.';
        }
    }

    public function editar(int $id, array $data, array $files): void
    {
        $result = $this->editarProduto($id, $data, $files);
        $acao = 'EditarProduto';
        $status = $result['success'] ? 'sucesso' : 'erro';
        header("Location: /produtos?status=$status&acao=$acao");
        exit;
    }

    public function remover(int $id): void
    {
        $result = $this->removerProduto($id);
        $acao = 'RemoverProduto';
        $status = $result['success'] ? 'sucesso' : 'erro';
        header("Location: /produtos?status=$status&acao=$acao");
        exit;
    }

    // Testes apenas em ambiente de desenvolvimento
    if (isset($_GET['test']) && $_GET['test'] === '1' && (getenv('APP_ENV') === 'development' || PHP_SAPI === 'cli')) {
        $controller = new ProdutoController();

        echo "<h2>Testes do ProdutoController</h2>";
        echo "<p><strong>Aviso:</strong> Esses testes devem ser executados apenas em ambiente de desenvolvimento! Use um banco de testes para evitar perda de dados.</p>";

        $data = [
            'nome' => 'Produto Teste ' . time(),
            'marca' => 'Marca X',
            'descricaoBreve' => 'Breve descrição',
            'descricaoTotal' => 'Descrição completa do produto',
            'preco' => 100.00,
            'precoPromo' => 90.00,
            'fgPromocao' => 1,
            'qtdEstoque' => 10,
            'id_subCategoria' => 1,
            'id_associado' => null,
            'corPrincipal' => '#ff0000',
            'hex1' => '#ffaaaa',
            'hex2' => '#ff5555'
        ];

        $uploadDir = __DIR__ . '/../../public/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        echo "<h3>Teste 1: Criar Produto (Sem Imagens)</h3>";
        $files = [];
        $result = $controller->criarProduto($data, $files);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
        $idProduto = $result['id'] ?? null;

        echo "<h3>Teste 2: Criar Produto (Com Imagem Simulada)</h3>";
        $files = [
            'img1' => [
                'name' => 'teste1.jpg',
                'type' => 'image/jpeg',
                'tmp_name' => $uploadDir . 'teste1.jpg',
                'error' => UPLOAD_ERR_OK,
                'size' => 1024
            ]
        ];
        file_put_contents($uploadDir . 'teste1.jpg', 'teste');
        $result = $controller->criarProduto($data, $files);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
        $idProdutoComImagem = $result['id'] ?? null;

        echo "<h3>Teste 3: Editar Produto (Substituir Imagem)</h3>";
        if ($idProdutoComImagem) {
            $data['nome'] = 'Produto Editado ' . time();
            $files = [
                'img1' => [
                    'name' => 'teste2.jpg',
                    'type' => 'image/jpeg',
                    'tmp_name' => $uploadDir . 'teste2.jpg',
                    'error' => UPLOAD_ERR_OK,
                    'size' => 1024
                ]
            ];
            file_put_contents($uploadDir . 'teste2.jpg', 'teste');
            $result = $controller->editarProduto($idProdutoComImagem, $data, $files);
            echo "<pre>";
            print_r($result);
            echo "</pre>";
            echo "<p>Imagem antiga (teste1.jpg) " . (file_exists($uploadDir . 'teste1.jpg') ? 'não foi removida!' : 'foi removida com sucesso.') . "</p>";
        } else {
            echo "<p>Falha: ID do produto com imagem não disponível.</p>";
        }

        echo "<h3>Teste 4: Buscar Produto</h3>";
        if ($idProduto) {
            $produto = $controller->getProduto($idProduto);
            echo "<pre>";
            print_r($produto ?: 'Produto não encontrado');
            echo "</pre>";
        } else {
            echo "<p>Falha: ID do produto não disponível.</p>";
        }

        echo "<h3>Teste 5: Listar Todos os Produtos</h3>";
        $produtos = $controller->listarTodos();
        echo "<pre>";
        print_r($produtos);
        echo "</pre>";

        echo "<h3>Teste 6: Listar com Filtro (Preço, 'Teste')</h3>";
        $produtosFiltrados = $controller->listarTodos('preco', 'Teste');
        echo "<pre>";
        print_r($produtosFiltrados);
        echo "</pre>";

        echo "<h3>Teste 7: Remover Produto</h3>";
        if ($idProdutoComImagem) {
            $result = $controller->removerProduto($idProdutoComImagem);
            echo "<pre>";
            print_r($result);
            echo "</pre>";
            echo "<p>Imagem (teste2.jpg) " . (file_exists($uploadDir . 'teste2.jpg') ? 'não foi removida!' : 'foi removida com sucesso.') . "</p>";
        } else {
            echo "<p>Falha: ID do produto não disponível.</p>";
        }

        echo "<h3>Teste 8: Renderizar Formulário de Edição</h3>";
        if ($idProduto) {
            ob_start();
            $controller->editarForm($idProduto);
            $output = ob_get_clean();
            echo "<p>Formulário de edição renderizado com sucesso? " . ($output ? 'Sim' : 'Não') . "</p>";
            echo "<pre>Output: " . htmlspecialchars($output) . "</pre>";
        } else {
            echo "<p>Falha: ID do produto não disponível.</p>";
        }
    }
}
?>