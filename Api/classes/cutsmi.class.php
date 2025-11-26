<?php

class Teste
{
    // Método simples para testar/simular o retorno de sucesso
    public function conexao()
    {
        // Se você não chamou DB::connect() e chegou aqui, a conexão de código está OK!
        echo json_encode(["status" => "sucesso", "mensagem" => "Teste de conexão do arquivo lido: conexao bem sucedida."]);
        exit; // Garante que não haja mais output
    }
}