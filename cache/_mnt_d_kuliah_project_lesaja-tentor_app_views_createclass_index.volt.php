<body style="background-color: #FF7408;">
    <?= $this->flashSession->output() ?>
    
    <?= $this->tag->form(['createclass/createClassSubmit', 'method' => 'post']) ?>
        <div class="box-center">
            <center>
                <?= $this->tag->linkTo(['dashboard', $this->tag->image(['img/lesaja.png', 'width' => '200'])]) ?>
                <h5><br>
                    <label style="font-size: medium; color:#FF7408" for="reset">Buat Kelas Baru</label>
                </h5>
            </center>
                       
            <select name="jenjang" class="form-control mr-sm-2" style="margin: 30px 0;">
                <option value="" disabled selected>Pilih jenjang pendidikan..</option>
                <option value="sd">SD</option>
                <option value="smp">SMP</option>
                <option value="sma">SMA</option>
            </select>

            <select name="mapel" class="form-control mr-sm-2" style="margin: 10px 0;">
                <option value="" disabled selected>Pilih mata pelajaran..</option>
                <optgroup label="SD">
                    <option value="Matematika">Matematika</option>
                    <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                    <option value="IPA">IPA</option>
                    <option value="IPS">IPS</option>
                    <option value="TIK">TIK</option>
                </optgroup>
                <optgroup label="SMP">
                    <option value="Matematika">Matematika</option>
                    <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                    <option value="TIK">TIK</option>
                    <option value="Biologi">Biologi</option>
                    <option value="Kimia">Kimia</option>
                    <option value="Fisika">Fisika</option>
                    <option value="Sejarah">Sejarah</option>
                </optgroup>
                <optgroup label="SMA">
                    <option value="Matematika">Matematika</option>
                    <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="TIK">TIK</option>
                    <option value="Biologi">Biologi-IPA</option>
                    <option value="Kimia">Kimia-IPA</option>
                    <option value="Fisika">Fisika-IPA</option>
                    <option value="Sejarah">Sejarah-IPS</option>
                    <option value="Geografi">Geografi-IPS</option>
                    <option value="Sosiologi">Sosiologi-IPS</option>
                </optgroup>
            </select>
            <br>
            <div align="center">
                <a href='/index' class="btn btn-sm btn-outline-success" type="button" style="margin-right: 20px;">CANCEL</a>
                <?= $this->tag->submitButton(['SUBMIT', 'class' => 'btn btn-sm btn-success']) ?>
            </div>
    <?= $this->tag->endform() ?>
</body>


