<?php 
    include "./database/conexao.php";
    session_start();
    if(!isset($_SESSION["unidade_id"]) && !isset($_SESSION["adm_login"])){
        //echo($_SESSION["unidade_id"]);
        echo("<script>window.location='./pages/login.php'</script>");
    }
    if(isset($_SESSION["unidade_id"])){
        $unidadeId = $_SESSION['unidade_id'];
        $logindeUnidade = true;
    }else{
        $logindeUnidade = false;
    }
    
?>
<?php include './includes/head.php'?>
    <title>Sirius do Norte</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    
</head>
<body>
    
    <?php include "./includes/header.php"?>


<main>
    
<?php 
    if($logindeUnidade){
        echo("<h2>Unidade ".$_SESSION['unidade_nome']."</h2>");
    }else{
        include './includes/menu.php';
        echo("<h2>Desafios enviados</h2>");

    }
?>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <?php 
                if($logindeUnidade){
                    echo("<th scope='col' colspan='1'>Desafio</th><th scope='col' colspan='1'>Pontos</th><th scope='col' colspan='1'>Ação</th> <th scope='col' colspan='1'>Status</th>");
                }else{
                    echo("<th scope='col'>Desafio</th>
                    <th scope='col'>Unidade</th>
                    <th scope='col'>Data</th>
                    <th scope='col'>Analisar</th>
                    ");
                }



                ?>
                
            
            </tr>
            
        </thead>
        
        <tbody>
        <?php 
            if(isset($_SESSION['unidade_nome'])){
                $sql = mysqli_query($conexao, "SELECT d.id, d.nome, d.pontos, du.status from desafios_unidades du
                join desafios d on du.id_desafio = d.id
                join unidades u on u.id = $unidadeId and u.id = du.id_unidade;");
            }else{
                $sql = mysqli_query($conexao, "SELECT e.id_unidade, e.id_desafio, e.path_img, e.relatorio, e.data_upload, u.nome as 'nome_unidade', desafios.nome as 'nome_desafio'  FROM `enviados` e
                join desafios_unidades du on du.id_desafio = e.id_desafio and e.id_unidade = du.id_unidade and du.status = 'enviado'
                join unidades u on u.id = e.id_unidade 
                join desafios on desafios.id = e.id_desafio");
            }
            while($desafios = mysqli_fetch_assoc($sql)){
                if(isset($_SESSION['unidade_nome'])){
                if($desafios['status'] == 'enviado' || $desafios['status'] == 'concluido'){
                    echo("<tr class='concluido'>
                <td>".$desafios['nome']."</td><td>".$desafios['pontos']."</td>
                <td></td>
                <td>".$desafios['status']."</td>
                </tr>");

                }else{
                    echo("<tr>
                <td>".$desafios['nome']."</td>
                <td>".$desafios['pontos']."</td>
                <td><a href='./pages/desafio.php?id=".$desafios['id']."'>Responder</a></td>
                <td>".$desafios['status']."</td>
                </tr>");
                }
                }else{
                    echo("<tr>
                
                <td>".$desafios['nome_desafio']."</td>
                <td>".$desafios['nome_unidade']."</td>
                <td>".$desafios['data_upload']."</td>
                <td><a href='./pages/verEnvio.php?uid=".$desafios['id_unidade']."&did=".$desafios['id_desafio']."'>Analisar</a></td>");
                }
                
            }
        
        ?>
        </tbody>
        
    </table>
    <?php 
    if(isset($_SESSION['unidade_nome'])){
        echo('<a class="pdf" href="./pages/pdf.php">Gerar PDF</a>');
    }
    
    ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
