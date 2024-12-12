<?php 
require_once __DIR__ . '/unidadeModel.php';
class DesafiosModel{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }


    public function apagarDesafio($id){
        $unidade = new UnidadeModel($this->db);
        $sql = mysqli_query($this->db, "SELECT id_unidade from desafios_unidades where id_desafio = $id and status = 'concluido'");

        mysqli_query($this->db, "delete from desafios where id = $id");

        if($sql->num_rows > 0){
            while($idUnidade = mysqli_fetch_assoc($sql)){
                $unidade->atualizarPontos($idUnidade['id_unidade']);
            }
        }
        
        

    }
}


?>