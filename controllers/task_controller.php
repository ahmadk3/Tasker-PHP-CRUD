<?php

    $db = mysqli_connect('localhost', 'root','', 'tasker');

    $name = "";
    $description = "";
    $file = "";

    //call to create a task
    if(isset($_POST['btn-create'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        //check if file was uploaded
        if(file_exists($_FILES['uploadedFile']['tmp_name'])){
            $file = $_FILES['uploadedFile']['tmp_name'];
            $path = '../files/' . $_FILES['uploadedFile']['name'];
            move_uploaded_file($file, $path);
            $query = "INSERT INTO tb_tasks(name, description, file)
                      VALUES ('$name', '$description', '$path')";
        }
        else{
            $query = "INSERT INTO tb_tasks(name, description)
                      VALUES ('$name', '$description')";
        }
        mysqli_query($db, $query);
        header('location: ../views/tasks.php');
    }

    //call for opening a task
    elseif(isset($_POST['view-task'])){
        $id = $_POST['id'];
        header('location: ../views/task.php?id=' . $id);
    }

    //call to update a task
    elseif(isset($_POST['btn-update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        //check if file was uploaded
        if(file_exists($_FILES['file']['tmp_name'])) {
            $file = $_FILES['file']['tmp_name'];
            $path = '../files/' . $_FILES['file']['name'];
            move_uploaded_file($file, $path);
            $query = "UPDATE tb_tasks
                  SET name = '$name', description = '$description', file = '$path'
                  WHERE id = '$id'";
        }
        else{
            $query = "UPDATE tb_tasks
                  SET name = '$name', description = '$description'
                  WHERE id = '$id'";
        }
        mysqli_query($db, $query);
        header('location: ../views/tasks.php');
    }

    //call to delete a task
    elseif(isset($_POST['btn-delete'])){
        $id = $_POST['id'];
        $query = "DELETE FROM tb_tasks WHERE id = '$id'";

        mysqli_query($db, $query);
        header('location: ../views/tasks.php');
    }

?>