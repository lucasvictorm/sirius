<?php 
    include "../database/conexao.php";

    $login = $_POST["login"];
    $senha = $_POST["senha"];

    if($login == 77777){
        $sql =  mysqli_query($conexao, "select login, nome from adms where login=$login and senha = '$senha'");

        $row = mysqli_num_rows($sql);

        if($row > 0){
            $did =mysqli_fetch_assoc($sql);
            session_start();
            $_SESSION['adm_login'] = $did['login'];
            $_SESSION['adm_nome'] = $did['nome'];
            
            echo("<script>window.location='../index.php'</script>");
        }else{
            echo("<script>window.location='../pages/login.php?status=".'erro'."'</script>");
        }

    }else{
        $sql =  mysqli_query($conexao, "select id, nome from unidades where login=$login and senha = '$senha'");
        $row = mysqli_num_rows($sql);

    if($row > 0){
        $did =mysqli_fetch_assoc($sql);
        session_start();
        $_SESSION['unidade_id'] = $did['id'];
        $_SESSION['unidade_nome'] = $did['nome'];
        
        echo("<script>window.location='../index.php'</script>");
    }else{
        echo("<script>window.location='../pages/login.php?status=".'erro'."'</script>");
    }

   
    
    }

?>