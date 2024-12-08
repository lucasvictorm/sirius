<?php 
    include "../database/conexao.php";
    session_start();
    if(!isset($_SESSION["unidade_id"]) && !isset($_SESSION["adm_login"])){
        //echo($_SESSION["unidade_id"]);
        echo("<script>window.location='login.php'</script>");
    }
    if(isset($_SESSION["unidade_id"])){
        $unidadeId = $_SESSION['unidade_id'];
        $logindeUnidade = true;
    }else{
        $logindeUnidade = false;
    }
    
?>
<?php include '../includes/head.php'?>
    <title>Sirius do Norte</title>
    
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
    <?php include "../includes/header.php"?>


<main>
    <h2>Desafios concluídos</h2>
        
    
    <table class="table">
        <thead>
            <tr>
                <?php 
                if($logindeUnidade){
                    echo("<th scope='col' colspan='1'>Desafio</th><th scope='col' colspan='1'>Pontos</th><th scope='col' colspan='1'>Ação</th>");
                }else{
                    echo("<th scope='col'>Desafio</th>
                    <th scope='col'>Unidade</th>
                    <th scope='col'>Data</th>
                    <th scope='col'>Ver</th>");
                }



                ?>
                
            
            </tr>
            
        </thead>
        
        <tbody>
        <?php 
            
                $sql = mysqli_query($conexao, "SELECT e.id_unidade, e.id_desafio, e.path_img, e.relatorio, e.data_upload, u.nome as 'nome_unidade', desafios.nome as 'nome_desafio'  FROM `enviados` e
                join desafios_unidades du on du.id_desafio = e.id_desafio and e.id_unidade = du.id_unidade and du.status = 'concluido'
                join unidades u on u.id = e.id_unidade 
                join desafios on desafios.id = e.id_desafio");
            
            while($desafios = mysqli_fetch_assoc($sql)){
                
                    echo("<tr>
                
                <td>".$desafios['nome_desafio']."</td>
                <td>".$desafios['nome_unidade']."</td>
                <td>".$desafios['data_upload']."</td>
                <td><a href='./visualizar.php?uid=".$desafios['id_unidade']."&did=".$desafios['id_desafio']."'>Ver</a></td>");
                
            }
        
        ?>
        </tbody>
        
    </table>
</main>


</body>
</html>
