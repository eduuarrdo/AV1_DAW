<?php
   /* $NOME = "";
    $EMAIL = "";
    $SENHA = "";
    $TIPO = "";
    $PERFIL = "";
    */
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodedados = "acesso";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $NOME = $_POST["nome"];
        $EMAIL = $_POST["email"];
        $SENHA = $_POST["senha"];
        $TIPO = $_POST["tipo"];
        $PERFIL = $_POST["perfil"];

        $conn = new mysqli ($servidor, $usuario, $senha, $bancodedados);

        if($conn->connect_error)
        {
            die("Erro de conexão com banco de dados");
        }else{
            echo "Conexão com banco bem sucedida!";
        }

        $sql = "INSERT INTO `usuarios`(`NOME`, `EMAIL`, `SENHA`, `TIPO`, `PERFIL`) VALUES ('$NOME', '$EMAIL', '$SENHA', '$TIPO', '$PERFIL')";

        $resul = $conn->query($sql);

        if($resul>0)
        {
             echo " Usuário Criado! ";
        }
       
        /* Utilizando arquivos
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
        */
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
                <label for="nome">Nome do Usuário </label><br>
                <input type="text" name="nome"><br>
                
                <label for="email"> Email </label><br>
                <input type="text" name="email"><br>
                
                <label for="senha"> Senha </label><br>
                <input type="password" name="senha"><br>
                
                <label for="tipo"> Tipo </label><br>
                <input type="text" name="tipo"><br>
                
                <label for="perfil"> Perfil </label><br>
                <input type="text" name="perfil"><br><br>
                
                <input type="submit" value="Criar Usuario">
            </form> <br>

            <a href="index.html"> Voltar ao Menu </a>

        </body>
    </html>
