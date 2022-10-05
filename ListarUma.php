<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancodedados = "acesso";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $ID = $_POST["id"];

        $conn = new mysqli($servidor, $usuario, $senha, $bancodedados);

        if ($conn->connect_error) //verificando conexão
        {
            die("Erro de conexão com o banco de dados");
        }

        $sql = "SELECT `ID`, `nome`, `Período`, `IdPre`, `Creditos` FROM `disciplinas` WHERE `ID` = ('$ID')"; //selecionando tal disciplina

        $result = $conn->query($sql);

        if($result) //caso encontre
        {
            while ($info = mysqli_fetch_assoc($result)) //exibindo dados da disciplina
            {
                echo "<tr><td> ID: " . $info['ID'] . "</td>  ";
                echo "<td> Nome: " . $info['nome'] . "</td>  ";
                echo "<td> Periodo: " . $info ['Período'] . "</td>  ";
                echo "<td> Id Pre Requisito: " . $info ['IdPre'] . "</td>  ";
                echo "<td> Creditos: " . $info ['Creditos'] . "</td>  ";
                echo "</tr>";
            }
        }else
        {
            echo "Disciplina não encontrada!";
        }
        
    }
?>

<!Doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title> Listando uma disciplina </title>
            <link rel= "stylesheet" href="style.css">
        </head>

        <body>
            <h3> Insira o ID da disciplina desejada </h3>

            <form action="ListarUma.php" method="POST">
                <label for="id"> ID </label><br>
                <input type="text" name="id"><br><br>
                <input type="submit"><br>
            </form>

            <a href="index.html"> Voltar ao Menu </a>
        </body>
    </html>
