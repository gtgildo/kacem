<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "geral@kacem.co.ao";
    $subject = "Nova Solicitação de Microcrédito";

    // Coleta e sanitiza os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $produto = htmlspecialchars($_POST['produto']);
    $montante = htmlspecialchars($_POST['montante']);
    $prazo = htmlspecialchars($_POST['prazo']);
    $finalidade = htmlspecialchars($_POST['finalidade']);
    $descricao = htmlspecialchars($_POST['descricao-negocio']);
    $utilizacao = htmlspecialchars($_POST['utilizacao-credito']);

    // Monta o corpo da mensagem
    $message = "
    <h2>Nova Solicitação de Microcrédito</h2>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Telefone:</strong> $telefone</p>
    <p><strong>Produto:</strong> $produto</p>
    <p><strong>Montante:</strong> $montante Kz</p>
    <p><strong>Prazo:</strong> $prazo meses</p>
    <p><strong>Finalidade:</strong> $finalidade</p>
    <p><strong>Descrição do Negócio:</strong> $descricao</p>
    <p><strong>Utilização do Crédito:</strong> $utilizacao</p>
    ";

    // Cabeçalhos do e-mail
    $headers = "From: noreply@kacem.co.ao\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Envia o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>