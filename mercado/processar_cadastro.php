<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verificar se o e-mail é válido (pode ser uma validação mais robusta)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Verificar se a senha tem pelo menos 8 caracteres
        if (strlen($senha) >= 8) {
            // Armazenar os dados do cliente (em um array neste exemplo)
            $cliente = [
                "nome" => $nome,
                "email" => $email,
                "senha" => $senha
            ];
            $_SESSION["clientes"][] = $cliente;
            
            header("Location: login.php");
            exit();
        } else {
            echo "A senha deve ter pelo menos 8 caracteres.";
        }
    } else {
        echo "Endereço de e-mail inválido.";
    }
}
?>
