<?php
include("db.php");
$nome = '';
$telefone = '';
$data = '';
$status = '';
$observacao = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM empresa WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nome = $row['nome'];
        $telefone = $row['telefone'];
        $data = $row['data'];
        $status = $row['status'];
        $observacao = $row['observacao'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $data = $_POST['data'];
    $status = $_POST['status'];
    $observacao = $_POST['observacao'];

    $query = "UPDATE empresa set nome = '$nome', telefone = '$telefone', data = '$data', status = '$status', observacao ='$observacao' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Empresa atualizada com sucesso!';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input name="nome" type="text" class="form-control" value="<?php echo $nome; ?>">
                    </div>
                    <div class="form-group">
                        <input name="telefone" type="text" class="form-control" value="<?php echo $telefone; ?>">
                    </div>
                    <div class="form-group">
                        <input name="data" type="text" class="form-control" value="<?php echo $data; ?>">
                    </div>
                    <div class="form-group">
                        <input name="status" type="text" class="form-control" value="<?php echo $status; ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="observacao" class="form-control" cols="30" rows="10"><?php echo $observacao; ?></textarea>
                    </div>
                    <button class="btn-success" name="update">
                        Update
                    </button>



                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>