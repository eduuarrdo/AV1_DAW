<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodedados = "acesso";
/*
    $nome = "";
    $ID = 0;
    $Periodo = 0;
    $IDPre = 0;
    $Creditos = 0;
*/
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $Periodo = $_POST["periodo"];
        $IDPre = $_POST["idPre"];
        $Creditos = $_POST["cred"];

        $conn = new mysqli ($servidor, $usuario, $senha, $bancodedados);

        if($conn->connect_error)
        {
            die("Erro de conecão com o banco de dados");
        }else{
            echo "Conexão com banco bem sucedida!";
        }

        $sql = "INSERT INTO `disciplinas`(`nome`, `Período`, `IdPre`, `Creditos`) VALUES (`$nome`,`$Periodo`,`$IDPre`,`$Creditos`)";
        $result = $conn->query($sql);

        if($result>0)
        {
             echo " Disciplina Criada! ";
        }
       

        /* formato com arquivo
        if (!file_exists("Disciplina.txt")){
            $txt = "nome;id;periodo;idPre;cred\n";
            fwrite($Disciplina, $txt);
            fclose($Disciplina);
        }
        $Disciplina = fopen("Disciplina.txt" , "a");
        $linha = $nome . ";" . $ID . ";" . $Periodo . ";" . $IDPre . ";" . $Creditos . "\n";
        fwrite($Disciplina, $linha);
        echo "Disciplina Criada!";
        fclose($Disciplina);
        */

    }

    
?>

<!Doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title> Criar Disciplina </title>
            <link rel= "stylesheet" href="style.css">
        </head>

        <body>
        <h3> Preencha os campos para criação da disciplina </h3>

            <form action="CriarDisciplina.php" method="POST">
            <label for="nome">Nome da Disciplina </label>
            <input type="text" name="nome"><br>

            <label for="nome">Período</label>
            <input type="text" name="periodo"><br>

            <label for="nome"> ID Pre Requisitos  </label>
            <input type="text" name="idPre"><br>

            <label for="nome"> Creditos </label>
            <input type="text" name="cred"><br><br>
            <input type="submit" value="Criar Disciplina">
            </form>

            <a href="index.html"> Voltar ao Menu </a>

        </body>
    </html>
