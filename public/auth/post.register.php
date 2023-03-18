<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //validations

    require_once('../../Database.php');


    $conn= Database::getInstance()->getConnection();

    $sql = "INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";

    if ($conn->query($sql) === true)
    {
        echo "Records inserted successfully.";
        header("Location: /");
    }
    else {
        echo "ERROR: Could not able to execute $sql. "
               .$conn->error;
    }
     