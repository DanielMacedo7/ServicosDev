<?php
// Inclui o arquivo de configuração e a classe de conexão
require 'config.php';
require 'connect.php';

try {
    // Conecta ao banco de dados usando a classe Connect
    $connect = new Connect();
    $pdo = $connect->getPdo();

    // Query para selecionar todos os usuários
    $sql = "SELECT * FROM service";
    $stmt = $pdo->query($sql);

    // Armazena os resultados em um array
    $service = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($service);
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem de erro
    echo "Erro ao buscar dados no PostgreSQL: " . $e->getMessage();
}
?>
