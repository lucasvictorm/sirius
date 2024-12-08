<?php 
include '../database/conexao.php';
require_once '../dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    use Dompdf\Options;
    $options = new Options();
    $options->set('chroot', realpath(''));
    $dompdf = new Dompdf($options);
    
    
    session_start();
$unidadeId = $_SESSION['unidade_id']; 


$sql_dados = mysqli_query($conexao, "SELECT e.path_img, e.relatorio, u.nome as 'nome_unidade', desafios.nome as 'nome_desafio' FROM `enviados` e 
join unidades u on u.id = e.id_unidade
join desafios on desafios.id = e.id_desafio
join desafios_unidades du on desafios.id = du.id_desafio and du.status = 'concluido' and du.id_unidade = $unidadeId
where e.id_unidade = $unidadeId
");
$sql_nome = mysqli_query($conexao, "SELECT nome from unidades where id = $unidadeId");


$html = "<style>
*{
    font-family: Arial, Helvetica, sans-serif;
}
</style>

<h1 style='text-align: center'>Unidade ". mysqli_fetch_assoc($sql_nome)['nome']."</h1>";


while ($dados = mysqli_fetch_assoc($sql_dados)){
    var_dump($dados);
    $html .= "<div style='page-break-after: always;'>
    <h2 style='text-align: center;'>".$dados['nome_desafio']."</h2>
    <div style='text-align: center;'>
        <img src='".$dados['path_img']."' alt='' style='width: 300px; '>
    </div>
    
    <p>".$dados['relatorio']."</p>
</div>";
}




$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
header('Content-type: application/pdf');

echo $dompdf->output();
?>

