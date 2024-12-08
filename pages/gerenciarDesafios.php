
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
        $sql = mysqli_query($conexao, 'select id, nome, pontos from desafios');
        while($desafios =  mysqli_fetch_assoc($sql)){
            echo("<tr>
            <td>".$desafios['nome']."</td>
            <td>".$desafios['pontos']."</td>
            <td>
                <button type='button' data-id='".$desafios["id"]."' data-nome='".$desafios['nome']."' data-pontos='".$desafios['pontos']."' class='btn btn-success botaoEditar' data-bs-toggle='modal' data-bs-target='#editModal'>Editar</button>
                <button class='btn btn-danger'>Excluir</button>
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
            <form action="editarDesafio.php">
                <label for="inputNomeDesafio" class="form-label">Nome</label>
                <input type="text" name="nomeDesafio" class="form-control" id="inputNomeDesafio">

                <label for="pontosDesafio" class="form-label">Pontuação</label>
                <input type="number" name="pontosDesafio" class="form-control" id="pontosDesafio">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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
                document.getElementById('inputNomeDesafio').value = event.target.dataset.nome
                
            })
        })

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>