<?php

    include_once('back-end/create_all.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskList - Organize suas tarefas</title>

    <!-- Estilo CSS -->
    <link rel='stylesheet' type='text/css' href='style/estilo.css'>
</head>
<body>
    <header>
        <div class='container'>

            <a href='index.php' class='logo'>Task<span style='color: #00e87b'>List</span></a>

        </div>
    </header>
    <div style='background-color: #00e87b;text-align: center;padding: 3px;'>
        <ul id='mainMenu'>
            <li><a href='sobre.html'>SOBRE</a></li>
            <li><a href='https://github.com/MatGolzio/TaskList'>GIT HUB</a></li>
        </ul>
    </div>

    <div class='container'>
        <aside style='width: 20%;border: 2px solid #00e87b;border-radius: 5px 0px 0px 5px;float: left;margin-top: 40px;padding: 20px;height: 114px;'>
            <ul style='list-style-type: none;'>

                <li><a href='index.php' style='text-decoration: none;color: black;'>Adicionar Task</a></li>
                <li><a href='#' style='text-decoration: none;color: black;'>Remover Task</a></li>
                <li><a href='minhas_tasks.php' style='text-decoration: none;color: black;'>Minhas Tasks</a></li>

            </ul>
        </aside>
        <section id="content" style="border: 2px solid #00e87b;border-radius: 0px 5px 5px 0px;margin-top: 40px;width: 70%;float: left;padding: 20px;">

            <h3>Remover Tasks</h3>

            <table style='border: 2px solid #00e87b;padding: 20px;margin-top: 10px;width: 100%;'>
                <tr>
                    <th style='border: 1px solid #00e87b;padding: 10px;'>Nome</th>
                    <th style='border: 1px solid #00e87b;padding: 10px;'>Descrição</th>
                    <th style='border: 1px solid #00e87b;padding: 10px;'>Data de conclusão</th>
                    <th style='border: 1px solid #00e87b;padding: 10px;'>Concluida</th>
                    <th style='border: 1px solid #00e87b;padding: 10px;'>Remover</th>
                </tr>
                <?php
                    try {
                        // variáveis de configuração
                        $dns = "mysql:host=localhost;dbname=sistema_tasks";
                        $user = 'root';

                        // conexão
                        $conn = new PDO($dns, $user, '');

                        // busca pelas tasks e listagem
                        $query_search = "SELECT * FROM tasks";

                        $result = $conn -> query($query_search);

                        $lista = $result -> fetchAll();

                        foreach ($lista as $value) {
                            echo "<tr>
                                <td style='border: 1px solid #00e87b;padding: 10px;'>{$value['nome']}</td>
                                <td style='border: 1px solid #00e87b;padding: 10px;'>{$value['descricao']}</td>
                                <td style='border: 1px solid #00e87b;padding: 10px;'>{$value['data_de_conclusao']}</td>
                                <td style='border: 1px solid #00e87b;padding: 10px;'>{$value['concluida']}</td>
                                <td style='border: 1px solid #00e87b;padding: 10px;'><a href='back-end/remover.php?nome={$value['nome']}&desc={$value['descricao']}&data={$value['data_de_conclusao']}'><button style='background-color: #ff2d2d;padding: 10px;border: none;border-radius: 5px;color: white;cursor: pointer;'>Remover</button></a></td>";
                            echo "</tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Ocorreu um erro, contate o desenvolvedor (<a href='https://github.com/MatGolzio/TaskList'>Repositório</a>)<br><br>";
                        echo "Número do erro: " . $e-> getCode() . " | Erro: " . $e-> getMessage() . "<br><br>";
                        echo "<a href='../index.php'>Voltar para a tela incial</a>";
                    }

                ?>
            </table>

        </section>
    </div>
</body>
</html>

