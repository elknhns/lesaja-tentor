<body style="background-color: #FF7408;">
    {{ flashSession.output() }}
    {{ form('register/registerSubmit', 'method': 'post') }}
        <div class="box-center">
            <center>{{ link_to('dashboard', image('img/lesaja.png', 'width': '200')) }}</center>
                <input class="form-control mr-sm-2" name="nama" type="text" placeholder="Nama" required style="margin: 20px 0 30px 0;">
                <input class="form-control mr-sm-2" name = "email" type="email" placeholder="Email" required style="margin: 30px 0;">
                <input class="form-control mr-sm-2" name = "password" type="password" placeholder="Sandi" required style="margin: 30px 0;">
                <input class="form-control mr-sm-2" name = "confirm" type="password" placeholder="Konfirmasi Sandi" required style="margin: 30px 0 30px 0;">
            <center>
                {{ submit_button('DAFTAR', 'class':'btn btn-md btn-success') }}
            </center>   
            <br>
            <div class="bottom-login" align="center">
                <label style="font-size: small;" for="register-info">Sudah punya akun?</label>
                <a href='/login' class="btn-link" type="button">Masuk</a>
            </div>
        </div>
    {{ endform()}}
</body>