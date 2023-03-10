<?php
// database connection
include 'includes/db_connect.php';

// get person id
$id = $_GET['id'];

// delete person
$query = "DELETE FROM silsilah_budi WHERE id='$id'";
$result = mysqli_query($conn, $query);

// redirect to index page
header('Location: index.php');
