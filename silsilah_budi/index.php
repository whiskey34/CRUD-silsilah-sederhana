<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Test-PHP Programming</title>
</head>

<body>

    <div class="header text-center mb-2 mt-3">
        <h2>TEST - PHP PROGRAMER SOAL 1</h2>
    </div>

    <?php

    include "db_conn.php";

    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET["id"]);

        $sql = "DELETE FROM silsilah_budi WHERE id='$id'";
        $hasil = mysqli_query($conn, $sql);

        // kondisi
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'><p> Data Failed To Delete!. </p></div>";
        }
    }

    ?>

    <div class="card mb-4" style="margin : 18px 100px 0px 100px;">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-striped align-middle col-md-6">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Parent_id</th>
                            <th scope="col"># of Generation</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php

                    include "db_conn.php";
                    $sql = "SELECT * FROM silsilah_budi order by id asc";

                    $hasil = mysqli_query($conn, $sql);
                    $no = 0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;


                    ?>
                        <tbody>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data["name"]; ?></td>
                                <td><?= $data["gender"]; ?></td>
                                <td><?= $data["parent_id"]; ?></td>
                                <td><?= $data["generation"]; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= htmlspecialchars($data['id']); ?>" role="button" class="btn btn-warning">Edit</a>
                                    <a href="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?= $data['id']; ?>" class="btn btn-danger" role="button" onclick="return (confirm('Are you sure you want to delete this record?'))">Delete</a>
                                </td>
                            </tr>

                        </tbody>

                    <?php

                    }

                    ?>
                </table>

                <a href="add.php" class="btn btn-primary" role="button">Add New Data</a>
            </div>
        </div>
    </div>


    <div class="button-create">
        <!-- php disini -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>