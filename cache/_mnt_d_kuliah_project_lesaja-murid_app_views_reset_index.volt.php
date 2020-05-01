<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
</head>
<body class="bg-guest">
<?= $this->flashSession->output() ?>
<?= $this->tag->form(['reset/resetSubmit', 'method' => 'post']) ?>
    <div class="box" align = "center"> 
        <div class="content" align="center">
            <p>
                <?= $this->tag->linkTo(['login', $this->tag->image(['img/lesaja.png', 'width' => '250'])]) ?>
            </p>
            <h5><br>
            <label class="text-reset" for="reset">Reset Password</label>
            </h5>
            <p><br>
            <input class="form-control mr-sm-2" name="email" type="email" placeholder="Email">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name="old_pwd" type="password" placeholder="Masukkan Password Lama">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name="new_pwd" type="password" placeholder="Konfirmasi Password Baru">
            </p><br>
            <div align="center">
                <a href='/' class="btn btn-outline-small btn-primary:hover" type="button">CANCEL</a>
                <?= $this->tag->submitButton(['SUBMIT', 'class' => 'btn btn-submit btn-primary:hover']) ?>
            </div>
       </div>   
    </div> 
<?= $this->tag->endform() ?>
</body>
</html>