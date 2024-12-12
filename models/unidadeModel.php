<?php 

class UnidadeModel{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function atualizarPontos($id){
        $sql = mysqli_query($this->db, "
        select unidades.nome, SUM(desafios.pontos) as pontuacao from unidades
        join desafios_unidades on unidades.id = desafios_unidades.id_unidade 
        join desafios on desafios_unidades.id_desafio = desafios.id and status = 'concluido'
        where unidades.id = $id ");

        if($sql->num_rows > 0 ){
            while($pontos = mysqli_fetch_assoc($sql)){
                mysqli_query($this->db, "update unidades set pontos = ".$pontos['pontuacao']." where id = $id");
            }
        }

    }

    public function excluirUnidade($id){
        mysqli_query($this->db, "delete from unidades where id = $id");



    }
    

}


?>