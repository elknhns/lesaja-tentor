<body style="background-color: #FF7408;">
    <?= $this->flashSession->output() ?>
    <?= $this->tag->form(['login/loginSubmit', 'method' => 'post']) ?>
    <div class="box-center">
        <center>
            <?= $this->tag->linkTo(['dashboard', $this->tag->image(['img/lesaja.png', 'width' => '200'])]) ?>
        </center>
        <input class="form-control" name="email" type="text" placeholder="Email" required style="margin: 30px 0;">
        <input class="form-control" name="password" type="password" placeholder="Sandi" required style="margin: 10px 0 50px 0;">
       
        <div align="center" style="margin-bottom: 20px;">
            <?= $this->tag->submitButton(['MASUK', 'class' => 'btn btn-md btn-success']) ?>
        </div>
        <br>
        <div class="bottom-login" align="center">
            <label style="font-size: small;">Belum punya akun?</label>
            <a href='/register' class="btn-link" type="button">Daftar Sekarang</a>
        </div>
    </div>     
    <?= $this->tag->endform() ?>
</body>