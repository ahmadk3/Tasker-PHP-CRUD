<!DOCTYPE html>
<html>
<head>
    <title>Tasker - Sign up</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

    <div class="bootstrap-frm">
        <h1>TASKER - SIGN UP</h1>
        <form action="../controllers/login_controller.php" method="post">
            <?php session_start(); ?>
            <?php if(isset($_SESSION['signupError'])): ?>
                <div>
                    <span style="color:red">This e-mail is already registered.</span>
                </div>
                <?php unset($_SESSION['signupError']); ?>
            <?php endif; ?>
            <label>E-mail</label>
            <input type="email" name="email" required/>
            <label>Password</label>
            <input type="password" id="pass1" name="password" required/>
            <label>Confirm Password</label>
            <input type="password" id="pass2" name="password" required/>
            <div>
                <span id="pass-error"style="color:red" hidden>Passwords doesn't match.</span>
            </div>
            <div>
                <input class="button" name="subscribe" type="submit" value="Confirm" />
            </div>
        </form>
    </div>

    <script>
        window.onload = function (ev) {
            //function to validate if the two password fields are equal
            var pass1 = document.getElementById("pass1");
            var pass2 = document.getElementById("pass2");
            var btn = document.getElementsByClassName("button");
            var s = document.getElementById('pass-error');
            pass2.addEventListener("focusout", function(){
                if(pass2.value != '' && pass2.value == pass1.value){
                    btn[0].removeAttribute("disabled");
                    s.setAttribute('hidden', true);
                }
                else if(pass1.value != ''){
                    s.removeAttribute('hidden');
                    btn[0].setAttribute("disabled", true);
                }
            });
            pass1.addEventListener("focusout", function(){
                if(pass1.value != ''  && pass2.value == pass1.value){
                    btn[0].removeAttribute("disabled");
                    s.setAttribute('hidden', true);
                }
                else if(pass2.value != ''){
                    s.removeAttribute('hidden');
                    btn[0].setAttribute("disabled", true);
                }
            });

        }
    </script>

</body>
</html>