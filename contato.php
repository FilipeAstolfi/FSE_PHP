<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fseletro";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("A conexão falhou" . mysqli_connect_error());
}

if (isset($_POST['nome']) && isset($_POST['msg'])) {



    $nome = $_POST['nome'];
    $msg = $_POST['msg'];

    $sql = "insert into comentarios (nome, msg) values ('$nome', '$msg')";
    $result = $conn->query($sql);
    //echo "$nome enviou a seguinte mensagem: <br> $msg";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Contato - FULL STACK ELETRO</title>
    <link rel="stylesheet" href="./CSS/estilo.css">
</head>

<body>
    <!--Início menu-->
    <?php
    include_once('menu.html')
    ?>
    <!--Fim menu-->
    <h2 id="titulo">Contato</h2>
    <hr>
    <div class="contato">
        <img class="piccon" src="./Imagens/email-contato.png">
        <label class="txtemail">E-mail: contato@fullstackeletro.com</label>
    </div>


    <div class="contato">
        <img class="piccon2" src="./Imagens/whatsapp  contato.png">
        <label class="txtemail">Tel: 0800 564 874</label>
    </div>


    <form class="forms" method="post" action="">
        <h4 class="forms1">NOME: </h4>
        <input type="text" name="nome" style="width:400px">
        <h4 class="forms1">MENSAGEM: </h4>
        <textarea name="msg" style="width: 400px; height: 200px;"></textarea>
        <br>
        <input class="button" type="submit" value="ENVIAR">
    </form>
<br><br><br><br>
<center>
    <?php
    $sql = "select * from comentarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($rows = $result->fetch_assoc()) {
            echo "Data ", $rows['data'], "<br>";
            echo "Nome ", $rows['nome'], "<br>";
            echo "Mensagem ", $rows['msg'], "<br>";
            echo "<hr>";


        }
    } else {
        echo "Nenhum comentário ainda!";
    }
    ?></center>
    <br>
    <br><br><br><br><br>
    <br><br><br><br><br>

    <footer class="rodape">

        <p id="formas_de_pgmto">Formas de pagamento</p>
        <img width="25%" src="./Imagens/kindpng_2824108.png">
        <p> &copy; 2020 Recode Pro</p>
    </footer>
</body>

</html>