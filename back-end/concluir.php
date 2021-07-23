<?php
    try {
        include_once('create_all.php');

        // variáveis de configuração
        $dns = "mysql:host=localhost;dbname=sistema_tasks";
        $user = 'root';

        // nova conexão
        $conn = new PDO($dns, $user, "");

        $nome = $_GET['nome'];
        $desc = $_GET['desc'];
        $data = $_GET['data'];

        $query_up = "UPDATE tasks SET concluida = 'true' WHERE nome = '$nome' AND descricao = '$desc' AND data_de_conclusao = '$data'";

        $run = $conn -> exec($query_up);

        if ($run == FALSE) {
            echo "<script>alert('Não foi possível concluir sua task');</script>";
        } else {
            echo "<script>window.location.href='../minhas_tasks.php'</script>";
        }
    } catch (PDOException $e) {
        echo "Ocorreu um erro, contate o desenvolvedor (<a href='https://github.com/MatGolzio/TaskList'>Repositório</a>)<br><br>";
        echo "Número do erro: " . $e-> getCode() . " | Erro: " . $e-> getMessage() . "<br><br>";
        echo "<a href='../index.php'>Voltar para a tela incial</a>";
    }
?>
