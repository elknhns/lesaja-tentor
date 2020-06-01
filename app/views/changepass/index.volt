<body style="background-color: #FF7408;">
    {{ flashSession.output() }}
    {{ form('changepass/changePassSubmit', 'method': 'post') }}
        <div class="box-center">
            <center>
                {{ link_to('dashboard', image('img/lesaja.png', 'width': '200')) }}
                <h5><br>
                    <label style="font-size: medium; color:#FF7408" for="reset">Ubah Password</label>
                </h5>
            </center>
            
            <input class="form-control mr-sm-2" name=old-pwd-ten type="password" required placeholder="Masukkan Password Lama">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name=new-pwd-ten type="password" required placeholder="Masukkan Password Baru">
            </p>
            <p><br>
            <input class="form-control mr-sm-2" name=new-pwd1-ten type="password" required placeholder="Konfirmasi Password Baru">
            </p><br>
            
            <br>
            <div align="center">
                <a href='/index' class="btn btn-sm btn-outline-success" type="button" style="margin-right: 20px;">CANCEL</a>
                {{ submit_button('SUBMIT', 'class':'btn btn-sm btn-success') }}
            </div>
    {{ endform()}}
</body>


