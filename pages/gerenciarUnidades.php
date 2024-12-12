
<?php 
include '../database/conexao.php';
include '../includes/head.php';
?>
<title>Gerenciar desafios</title>
<link rel="stylesheet" href="../assets/css/gerenciarDesafios.css">
</head>

<body>
    <?php include '../includes/header.php'?>
    <h2>Gerenciar desafios</h2>

    <table class="table">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Pontuação</th>
            <th scope="col">Ações</th>
        </tr>
        <?php 
        $sql = mysqli_query($conexao, 'select id, nome, pontos from unidades');
        while($unidades =  mysqli_fetch_assoc($sql)){
            echo("<tr>
            <td>".$unidades['nome']."</td>
            <td>".$unidades['pontos']."</td>
            <td>
                <button type='button' data-id='".$unidades["id"]."' data-nome='".$unidades['nome']."' data-pontos='".$unidades['pontos']."' class='btn btn-success botaoEditar' data-bs-toggle='modal' data-bs-target='#editModal'>Editar</button>
                
                <button type='button' class='btn btn-danger botaoExcluir' data-id='".$unidades["id"]."' data-bs-toggle='modal' data-bs-target='#excluirModal'>Excluir</button>
               
                
            </td>
        </tr>");
        }
    
        ?>
    
        <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/editarUnidade.php" id="formEdicao">
                    <label for="inputNomeUnidade" class="form-label">Nome</label>
                    <input type="text" name="nomeUnidade" class="form-control" id="inputNomeUnidade">

                    <label for="pontosUnidade" class="form-label">Pontuação</label>
                    <input type="number" name="pontosUnidade" class="form-control" id="pontosUnidade">
                    <input type="hidden" name="idUnidade" id="idUnidade">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary"  onclick="enviarEdicao()">Salvar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="excluirModal" tabindex="-1" aria-labelledby="exluirModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exluirModalLabel">Excluir Desafio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/excluirUnidade.php" id="formExcluir">
                    <p>Deseja mesmo excluir a unidade?</p>
                    <input type="hidden" name="id" id="idUnidadeExcluir">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger"  onclick="excluirUnidade()">Excluir</button>
            </div>
            </div>
        </div>
    </div>
        

    </table>

    <script>
        let botoesEditar = document.querySelectorAll('.botaoEditar');
        botoesEditar.forEach((botao) => {
            botao.addEventListener('click', (event) =>{
                document.getElementById('editModalLabel').innerText = event.target.dataset.nome
                document.getElementById('inputNomeUnidade').value = event.target.dataset.nome
                document.getElementById('pontosUnidade').value = event.target.dataset.pontos
                document.getElementById('idUnidade').value = event.target.dataset.id
                
            })
        })

        let botoesExcluir = document.querySelectorAll('.botaoExcluir');
        botoesExcluir.forEach((botao) => {
            botao.addEventListener('click', (event) =>{
                document.getElementById('idUnidadeExcluir').value = event.target.dataset.id
                
            })
        })

        function enviarEdicao(){
            let formulario = document.getElementById('formEdicao')
            formulario.submit();
        }

        function excluirUnidade(){
            document.getElementById('formExcluir').submit();
        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>