<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
</head>
<body>
    <?= $this->flashSession->output() ?>
    <?= $this->tag->form(['register/registerSubmit', 'method' => 'post']) ?>
    <div class="box-register" align = "center"> 
        <div class="content-register" align="center">
            <p>
                <?= $this->tag->linkTo(['dashboard', $this->tag->image(['img/lesaja.png', 'width' => '250'])]) ?>
            </p>
            <p>
                <input class="form-control mr-sm-2" name="nama" type="text" placeholder="Nama" required>
            </p>
            <p><br>
                <input class="form-control mr-sm-2" name = "email" type="email" placeholder="Email" required>
            </p>
            <p><br>
                <input class="form-control mr-sm-2" name = "password" type="password" placeholder="Password" required>
            </p>
            <p><br>
                <input class="form-control mr-sm-2" name = "confirm" type="password" placeholder="Konfirmasi Password" required>
            </p><br>   
                <?= $this->tag->submitButton(['DAFTAR', 'class' => 'btn btn-login-register btn-primary:hover']) ?>
            <br>
            <br>
            <div class="bottom-login" align="center">
                <label class="register" for="register-info">Sudah punya akun?</label>
                <a href='/login' class="btn btn-outline-small" type="button">Masuk</a>
            </div>
       </div>     
    </div> 
    <?= $this->tag->endform() ?>
</body>
</html>