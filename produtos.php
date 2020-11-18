<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "fseletro";

//criando a conexão
$conn = mysqli_connect($servername, $username, $password, $database);

//verificando a conexão
if (!$conn) {
    die("A conexão falhou" . mysqli_connect_error());
}

$sql = "select * from produto";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($rows = $result->fetch_assoc()) {
       
    }
} else {
    echo "Nenhum produto cadastrado!";
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <title>Produtos - FULL STACK ELETRO</title>
    <link rel="stylesheet" href="./CSS/estilo.css">
    <script src="./js/funcoes.js"></script>
</head>

<body>
    <!--Início menu-->
    <?php
    include_once('menu.html')
    ?>
    <!--Fim menu-->
    <header>
        <h2 id="titulo">Produtos</h2>
    </header>

    <hr>
    <div class="categorias">

        <h3 class="padding">
            Categorias
        </h3>
        <ul class="list1">
            <li class="destak" onmouseover="mudaCor(this)" onmouseout="mudaCor(this)" onclick="exibir_todos()" onmousemove="">
                Todos (12)
            </li>
            <li class="destak" onmouseover="mudaCor(this)" onmouseout="mudaCor(this)" onclick="exibir_categoria('geladeira')" onmousemove="">
                Geladeiras (3)
            </li>
            <li class="destak" onmouseover="mudaCor(this)" onmouseout="mudaCor(this)" onclick="exibir_categoria('fogao')" onmousemove="">
                Fogões (2)
            </li>
            <li class="destak" onmouseover="mudaCor(this)" onmouseout="mudaCor(this)" onclick="exibir_categoria('microondas')" onmousemove="">
                Microondas (3)
            </li>
            <li class="destak" onmouseover="mudaCor(this)" onmouseout="mudaCor(this)" onclick="exibir_categoria('lava_roupas')" onmousemove="">
                Lavadora de roupas (2)
            </li>
            <li class="destak" onmouseover="mudaCor(this)" onmouseout="mudaCor(this)" onclick="exibir_categoria('lava_loucas')" onmousemove="">
                Lava-Louças (2)
            </li>
        </ul>
    </div>

    <div class="produtos">

        <?php

        $sql = "select * from produto";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            while ($rows = $result->fetch_assoc()) {
            
        ?>
                <div class="boxproduto" id="<?php echo $rows["categoria"]; ?>">

                    <img src="<?php echo $rows["foto"]; ?>" width="120px" onclick="destaque (this)">
                    <p class="zirigui"><?php echo $rows["descricao"]; ?></p>
                    <hr>
                    <P class="riscadin">R$<?php echo $rows["preco"]; ?></P>
                    <p class="descritivo">R$<?php echo $rows["preco_final"]; ?></p>
                </div>


        <?php
            }
        } else {
            echo "Nenhum produto cadastrado!";
        }



        ?>

    </div>


    <footer class="rodape">

        <p id="formas_de_pgmto">Formas de pagamento</p>
        <img width="25%" src="./Imagens/kindpng_2824108.png">
        <p> &copy; 2020 Recode Pro</p>
    </footer>
</body>

</html>



