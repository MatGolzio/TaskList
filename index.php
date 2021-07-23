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

                <li><a href='#' style='text-decoration: none;color: black;'>Adicionar Task</a></li>
                <li><a href='rm_tasks_front.php' style='text-decoration: none;color: black;'>Remover Task</a></li>
                <li><a href='' style='text-decoration: none;color: black;'>Editar Task</a></li>
                <li><a href='minhas_tasks.php' style='text-decoration: none;color: black;'>Minhas Tasks</a></li>

            </ul>
        </aside>
        <section id="content" style="border: 2px solid #00e87b;border-radius: 0px 5px 5px 0px;margin-top: 40px;width: 70%;float: left;padding: 20px;">

            <h3>Adicionar Task</h3>

            <form method='POST' action='back-end/nova_task.php' style='border: 2px solid #00e87b;padding: 20px;margin-top: 10px;'>

                <input type='text' style='border: 1px solid black;border-radius: 5px;padding:10px;' id='nome' name='nome' placeholder='Nome da Task'>
                <input type='text'  style='border: 1px solid black;border-radius: 5px;padding:10px;' id='desc' name='desc' placeholder='Descrição'>
                <input type='date'  style='border: 1px solid black;border-radius: 5px;padding:7px;' id='data' name='data' placeholder='Data de conclusão'>

                <input style='background-color: #00e87b;padding: 10px;border: none;border-radius: 5px;color: white;cursor: pointer;' type='submit' value="Adicionar">

            </form>

        </section>
    </div>
</body>
</html>
