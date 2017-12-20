<!DOCTYPE html>
<html>
    <head>
        <title>Tasker - Login</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <div class="bootstrap-frm">
            <h1>TASKER - LOGIN</h1>
            <form action="controllers/login_controller.php" method="post">
                <label>E-mail</label>
                <input type="email" name="email" required/>
                <label>Password</label>
                <input type="password" name="password" required/>
                <?php session_start(); ?>
                <?php if(isset($_SESSION['loginError'])): ?>
                    <div>
                        <span style="color:red">Invalid Credentials.</span>
                    </div>
                    <?php unset($_SESSION['loginError']); ?>
                <?php endif; ?>
                <div>
                    <input class="button" name="login" type="submit" value="Login"/>
                </div>
            </form>
            <div class="bottom-btn">
                <button id="signup" class="button">Sign up</button>
            </div>
        </div>
        <script>
            window.onload = function(){
                var button = document.getElementById('signup');
                button.addEventListener('click', function() {
                    document.location.href = 'views/signup.php';
                });
            };
        </script>
    </body>
</html>