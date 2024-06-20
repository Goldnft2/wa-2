<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de mensagen</title>
</head>
<body>
    <h2>Enviar Mensagem</h2>
    <form action="" method="post">
        <textarea name="mensagem" rows="4" cols="50" placeholder="Digite sua mensagem aqui..."></textarea><br>
        <input type="submit" value="Enviar">

    </form>

    <h2>Mensagens</h2>
    <div id="mensagens">
        <?php
        $arquivo = 'mensagens.txt';

        if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['mensagen'])){
            $mensagem = trim($_POST['mensagem']);
            file_put_contents($arquivo, $mensagem . PHP_EOL, FILE_APPEND);

        }

        if(file_exists($arquivo)) {
            $mensagens = file($arquivo, FILE_IGNORE_NEW_LINES);
            foreach ($mensagens as $mensagem) {
                echo '<p>' . htmlspecialchars($mensagem) . '</p>';
            }  
        }else{
                echo 'Nenhuma mensagem ainda.';
            }
        ?>
</div>
</body>
</html>