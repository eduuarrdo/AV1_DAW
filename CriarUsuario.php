<?php
    $NOME = "";
    $EMAIL = "";
    $SENHA = "";
    $TIPO = "";
    $PERFIL = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $NOME = $_POST["nome"];
        $EMAIL = $_POST["email"];
        $SENHA = $_POST["senha"];
        $TIPO = $_POST["tipo"];
        $PERFIL = $_POST["perfil"];

        
        if (!file_exists("Usuario.txt")){
            $txt = "nome;email;senha;tipo;perfil\n";
            fwrite($Usuario, $txt);
            fclose($Usuario);
        }
        $Usuario = fopen("Usuario.txt" , "a");
        $linha = $NOME . ";" . $EMAIL . ";" . $SENHA . ";" . $TIPO . ";" . $PERFIL . "\n";
        fwrite($Usuario, $linha);
        echo "Usuario Criado!";
        fclose($Usuario);
    }

    
?>

<!Doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title> Criar Usuario  </title>
        </head>

        <body>
            <h3> Preencha os campos para criação de um usuário </h3>
            <form action="CriarUsuario.php" method="POST">
            Nome do Usuário <input type="text" name="nome"><br>
            Email <input type="text" name="email"><br>
            Senha <input type="text" name="senha"><br>
            Tipo <input type="text" name="tipo"><br>
            Perfil <input type="text" name="perfil"><br><br>
            <input type="submit" value="Criar Usuario">
            </form> <br>

            <a href="index.html"> Voltar ao Menu </a>

        </body>
    </html>