<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
</head>
<body class="bg-guest">
    <?= $this->flashSession->output() ?>
    <?= $this->tag->form(['login/loginSubmit', 'method' => 'post']) ?>
    <div>
        <div class="box" align = "center"> 
            <div class="content" align="center">
                <p>
                <?= $this->tag->linkTo(['dashboard', $this->tag->image(['img/lesaja.png', 'width' => '300'])]) ?>
                </p>
                <br>
                <p><br>
                <input class="form-control mr-sm-2" name=email type="text" placeholder="Email">
                    <!-- <php echo $this->tag->textField("Email"); ?> -->
                </p>
                <p><br>
                <input class="form-control mr-sm-2" name=password type="password" placeholder="Password">
                    <!-- <php echo $this->tag->textField("Password"); ?>   -->
                </p>  
                <h6 align="right">
                    <a href="/reset" class="btn btn-link">Lupa Password?</a>
                </h6>
                <?= $this->tag->submitButton(['MASUK', 'class' => 'btn btn-login-register btn-primary:hover']) ?>
                <br>
                <br>
                <div class="bottom-login" align="center">
                    <label class="register" for="register-info">Belum punya akun?</label>
                    <a href='/register' class="btn btn-outline-medium" type="button">Daftar Sekarang</a>
                </div>
           </div>     
        </div> 
    </div>
    <?= $this->tag->endform() ?>
</body>
</html>