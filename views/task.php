<!DOCTYPE html>
<html>
    <head>
        <title>Tasker - Login</title>
        <link rel="stylesheet" href="../styles/style.css">
    </head>
    <body>
        <div class="bootstrap-frm">
            <h1>TASKER</h1>
            <?php
                $db = mysqli_connect('localhost', 'root','', 'tasker');
                $id = $_GET['id'];
                $query = "SELECT * FROM tb_tasks WHERE id = '$id'";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_array($result);

            ?>
            <form enctype="multipart/form-data" action="../controllers/task_controller.php" method="post">
                <label>Name</label>
                <input type="text" name="name" class="form-inputs" value="<?php echo $row['name']?>" maxlength="100" disabled/>
                <label>Description</label>
                <textarea name="description" rows="5" class="form-inputs" disabled><?php echo $row['description']?></textarea>
                <input type="file" name="file" class="form-inputs" disabled/>
                <?php if(isset($row['file'])){ ?>
                    <label><a href="<?php echo $row['file']?>" download>Download File</a></label>
                <?php } ?>

                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>

                <div class="bottom-btn">
                    <input id="save" class="button" name="btn-update" type="submit" value="Save" hidden/>
                    <button id="edit" class="button">Edit Task</button>
                </div>
                <div class="bottom-btn">
                    <input id="delete" class="button delete-btn" name="btn-delete" type="submit" value="Delete Task"/>
                </div>
            </form>
            <div class="bottom-btn">
                <button id="back" class="button delete-btn" >Back</button>
            </div>
        </div>

        <script>
            window.onload = function(){
                var button = document.getElementById('edit');
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    var inputs = document.getElementsByClassName("form-inputs");
                    for(var i = 0; i < inputs.length; i++){
                        inputs[i].removeAttribute("disabled");
                    }
                    this.style.display = 'none';
                    var buttonSave = document.getElementById('save');
                    buttonSave.style.display = 'block';
                });

                var back = document.getElementById('back');
                back.addEventListener('click', function (e) {
                    document.location.href = 'tasks.php';
                });
            };

        </script>
    </body>
</html>
