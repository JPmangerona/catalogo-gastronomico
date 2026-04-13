<?php

namespace MVC\Controller;

use MVC\Model\Produto;
use MVC\Repository\ProdutoRepository;
use PDO;

class CreateProductController implements Controller
{
    private ProdutoRepository $repository;

    public function __construct(PDO $pdo)
    {
        $this->repository = new ProdutoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        // Se for GET, apenas mostra o formulário
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../View/create-product.php';
            return;
        }

        // Se for POST, processa o cadastro com VALIDAÇÃO (Requisito da entrevista!)
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        // Converte o formato brasileiro (1.000,00) para o padrão de validação Float nativo (1000.00)
        $precoRaw = $_POST['preco'] ?? '';
        $precoLimpo = str_replace('.', '', $precoRaw); // Remove pontos de milhar
        $precoLimpo = str_replace(',', '.', $precoLimpo); // Troca vírgula por ponto decimal
        $preco = filter_var($precoLimpo, FILTER_VALIDATE_FLOAT);

        if ($preco !== false && $preco > 9999.99) {
            header("Location: /admin/cadastrar?erro_preco=1");
            return;
        }

        if (strlen($nome) > 255) {
            header("Location: /admin/cadastrar?erro_nome=1");
            return;
        }

        if (strlen($descricao) > 1000) {
            header("Location: /admin/cadastrar?erro_descricao=1");
            return;
        }

        // Validação de campos obrigatórios
        if (!$nome || !$tipo || !$descricao || $preco === false) {
            header("Location: /admin/cadastrar?sucesso=0");
            return;
        }

        $produto = new Produto(
            null,
            $tipo,
            $nome,
            $descricao,
            $preco
        );

        // Lógica de upload de imagem (opcional, mas profissional)
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $nomeImagem = uniqid() . $_FILES['imagem']['name'];
            $caminhoDestino = __DIR__ . '/../../public/img/' . $nomeImagem;
            $sucessoUpload = move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino);
            
            if ($sucessoUpload) {
                $produto->setImagem($nomeImagem);
            } else {
                header("Location: /admin/cadastrar?erro_imagem=1");
                return;
            }
        } elseif (isset($_FILES['imagem']) && $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE) {
            // Houve algum erro de tamanho ou de formulário corrompido
            header("Location: /admin/cadastrar?erro_imagem=1");
            return;
        }

        $this->repository->salvar($produto);

        header("Location: /admin?sucesso=1");
    }
}
