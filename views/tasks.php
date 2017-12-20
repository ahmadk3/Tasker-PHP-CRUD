<!DOCTYPE html>
<html>
<head>
    <title>Tasker - Home</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="bootstrap-frm">
        <h1>TASKER</h1>

        <?php
            $db = mysqli_connect('localhost', 'root','', 'tasker');
            $tasks = mysqli_query($db, "SELECT * FROM tb_tasks");
        ?>

        <div>
            <table class="w3-table w3-bordered fixed">
                <col width="12px" />
                <col width="100px" />
                <col width="30px" />
                <?php while ($row = mysqli_fetch_array($tasks)) {?>

                    <tr>
                        <?php
                            $name = $row['name'];
                            if(strlen($row['name']) > 42){
                                $name = substr($row['name'],0, 42) . '...';
                            }
                        ?>

                        <td style="width: 15px"><?php echo $row['id']?></td>
                        <td style="width: 10px"><?php echo $name?></td>
                        <td>
                            <form method="post" action="../controllers/task_controller.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                                <input type="submit" name="view-task" value="Open" class="button"/>
                            </form>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </div>

        <div class="new-btn">
            <button id="create" class="button">New Task</button>
        </div>
    </div>

    <script>
        window.onload = function(){
            var button = document.getElementById('create');
            button.addEventListener('click', function() {
                document.location.href = 'newtask.php';
            });
        };
    </script>
</body>
</html>