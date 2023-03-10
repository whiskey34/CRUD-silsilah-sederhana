<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Edit Data</title>
</head>

<body>
    <div class="container">
        <div class="back-button mt-3">
            <a href="index.php" role="button" class="btn btn-info">Go Back</a>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <h5 class="card-title"> Edit Data </h5>

                <!-- script php nya -->

                <?php
                // database connection
                include 'db_conn.php';

                function input($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                if (isset($_GET['id'])) {
                    $id = input($_GET["id"]);

                    $sql = "SELECT * FROM silsilah_budi WHERE id=$id";
                    $hasil = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($hasil);
                }

                // get form data
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $id = htmlspecialchars($_POST['id']);
                    $name = input($_POST['name']);
                    $gender = input($_POST['gender']);
                    $parent_id = input($_POST['parent_id']);
                    $generation = input($_POST['generation']);

                    // update person
                    $sql = "UPDATE silsilah_budi SET name='$name', gender='$gender', parent_id='$parent_id', generation='$generation' WHERE id='$id'";
                    $hasil = mysqli_query($conn, $sql);

                    // redirect to index page with condition 
                    if ($hasil) {

                        header('Location: index.php');
                    } else {
                        echo "<div class='alert alert-danger'><p> Data Update Failed!</p></div>";
                    }
                }

                ?>

                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group mb-3">
                        <label for="Name">Nama</label>
                        <input type="text" name="name" class="form-control" id="Name" value="<?= $data['name']; ?>" placeholder="Nama">
                    </div>
                    <div class="form-group mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="Gender" aria-label="Default select example">
                            <?php
                            while ($row = mysqli_fetch_array($hasil)) {
                            ?>
                                <option value="<?= $row['id']; ?>" selected><?= $row['gender']; ?></option>

                            <?php } ?>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Parent_Id" class="form-label">Parent_id</label>
                        <input type="number" class="form-control" name="parent_id" value="<?= $data['parent_id']; ?>" id="Parent_Id" placeholder="ex: 2 ">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Generation">Generation</label>
                        <input type="number" name="generation" class="form-control" id="Generation" value="<?= $data['generation']; ?>" placeholder="ex: 4">
                    </div>

                    <input type="hidden" name="id" value="<?= $data['id']; ?>">

                    <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
                </form>


            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>