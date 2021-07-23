<?php
    try {
        include_once('create_all.php');

        // variáveis
        $nome = $_GET['nome'];
        $desc = $_GET['desc'];
        $data = $_GET['data'];

        // variáveis de configuração
        $dns = "mysql:host=localhost;dbname=sistema_tasks";
        $user = 'root';

        // nova conexão
        $conn = new PDO($dns, $user, "");

        // query para deletar
        $query_rm = "DELETE FROM tasks WHERE nome ='$nome' AND descricao = '$desc' AND data_de_conclusao = '$data'";

        $run = $conn -> exec($query_rm);

        if ($run == FALSE) {
            echo "<script>alert('Não foi possível remover sua task');</script>";
        } else {
            echo "<script>window.location.href='../rm_tasks_front.php'</script>";
        }
    } catch (PDOException $e) {
        echo "Ocorreu um erro, contate o desenvolvedor (<a href='https://github.com/MatGolzio/TaskList'>Repositório</a>)<br><br>";
        echo "Número do erro: " . $e-> getCode() . " | Erro: " . $e-> getMessage() . "<br><br>";
        echo "<a href='../index.php'>Voltar para a tela incial</a>";
    }
?>
