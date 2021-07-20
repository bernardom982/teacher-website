<?php
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        
		$nome = $_POST['nome'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
		$mensagem = $_POST['mensagem'];
		
        require 'assets/vendor/autoload.php';

        $from = new SendGrid\Email(null, "bernardomarques914@gmail.com");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "bernardomarques914@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Thais, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br> Email: $email <br> Numero: $numero <br> Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        header('Location: enviado.html')
		
        ?>
    </body>
</html>

