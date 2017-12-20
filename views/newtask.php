<!DOCTYPE html>
<html>
<head>
    <title>Tasker - Home</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="bootstrap-frm">
        <h1>TASKER</h1>

        <form enctype="multipart/form-data" action="../controllers/task_controller.php" method="post">
            <label>Name*</label>
            <input type="text" name="name" required/>
            <label>Description*</label>
            <textarea name="description" cols="40" rows="5"  required></textarea>
            <label>File</label>
            <input type="file" name="uploadedFile"/>
            <div class="bottom-btn">
                <button class="button" name="btn-create" value="Create">Create</button>
            </div>
        </form>

    </div>

</body>
</html>