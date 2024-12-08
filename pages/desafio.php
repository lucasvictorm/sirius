<?php include "../database/conexao.php";
    $desafio_id = $_GET["id"];
    $sql = mysqli_fetch_assoc(mysqli_query($conexao,
    "SELECT nome from desafios where id = $desafio_id"));

?>
<?php 
include '../includes/head.php'
?>
    <title>Desafio</title>
    
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script src="./src/summernote-pt-BR.js"></script>

    <link rel="stylesheet" href="../assets/css/desafio.css">

</head>
<body>
    <?php include "../includes/header.php"?>
    <main>
        <h1><?=$sql['nome']?></h1>
        <form action="../actions/concluir.php" enctype="multipart/form-data" method="post" >
            <input type="hidden" name="desafio_id" value=<?=$desafio_id?>>
            <div class="mb-3">
                <label for="foto" class="form-label">Enviar foto</label>
                <input class="form-control" type="file" name="foto" id="foto">
            </div>
            
            
            
                <label for="relatorio">Relatório</label>
                <textarea name="relatorio" id="summernote"></textarea>
            </div>
        
            <div class="divEnviar">
                <button type="submit" class="btn btn-success btn-lg fs-4 w-25">Enviar</button>
            </div>
            

        </form>

    </main>
    <script>
        $(document).ready(function() {
  $('#summernote').summernote({
    lang: 'pt-BR',
    toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript', 'fontname']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    
  ],
  height: '300px',
  });
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>