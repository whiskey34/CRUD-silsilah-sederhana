<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Add New Data</title>
</head>

<body>
    <div class="container">

        <div class="form mt-5">
            <div class="card">
                <div class="card-header">
                    <a href="index.php" role="button" class="btn btn-info">Go Back</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Add New Data</h5>
                    <?php

                    include "db_conn.php";

                    function input($data)
                    {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = input($_POST["name"]);
                        $parent_id = input($_POST["parent_id"]);
                        $generation = input($_POST["generation"]);
                        $gender = input($_POST["gender"]);


                        $sql = "INSERT INTO silsilah_budi (name,parent_id,generation,gender) values ('$name','$parent_id','$generation','$gender')";

                        $hasil = mysqli_query($conn, $sql);

                        if ($hasil) {
                            header("Location:index.php");
                        } else {
                            echo "<div class='alert alert-danger'> <p>Data Failed To Create</p></div>";
                        }
                    }

                    ?>

                    <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">


                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="ex: John">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Gender</label>
                            <select class="form-select" name="gender" aria-label="Default select example">
                                <option selected>Select Gender...</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Parent_id</label>
                            <input type="number" class="form-control" name="parent_id" id="exampleFormControlInput1" placeholder="ex: 2 ">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Generation</label>
                            <input type="number" class="form-control" name="generation" id="exampleFormControlInput1" placeholder="Ex: 1">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>