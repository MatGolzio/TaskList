<?php
    try {
        include_once('create_all.php');

        // variáveis do formulário
        $nome = $_POST['nome'];
        $desc = $_POST['desc'];
        $data = $_POST['data'];

        // variáveis de configuração
        $dns = "mysql:host=localhost;dbname=sistema_tasks";
        $user = 'root';

        // nova conexão
        $conn = new PDO($dns, $user, "");

        $query_add = "INSERT INTO tasks (nome, descricao, data_de_conclusao, concluida) VALUES (:nome, :desc, :data, 'false');";

        $stmt = $conn -> prepare($query_add);

        $stmt-> bindValue(':nome', $nome);
        $stmt-> bindValue(':desc', $desc);
        $stmt-> bindValue(':data', $data);

        $run = $stmt->execute();

        if ($run == FALSE) {
            echo "<script>alert('Não foi possível adicionar sua task');</script>";
        } else {
            echo "<script>alert('Task adicionada com sucesso!');</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }
    } catch (PDOException $e) {
        echo "Ocorreu um erro, contate o desenvolvedor (<a href='https://github.com/MatGolzio/TaskList'>Repositório</a>)<br><br>";
        echo "Número do erro: " . $e-> getCode() . " | Erro: " . $e-> getMessage() . "<br><br>";
        echo "<a href='../index.php'>Voltar para a tela incial</a>";
    }
?>
