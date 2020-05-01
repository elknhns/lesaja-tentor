<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lesaja</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="full">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Brand -->
            <a class="navbar-brand"><img src="img/lesaja.png" width=120></a>

            <!-- Links -->
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <div class="nav-item">
                        <div class="kelasaya"align="center">
                            <a href="#" width="50">Kelas Saya<span class="sr-only"></a>
                        </div>
                    </div>
                    <nav class="formbar">
                        <form name="form" action="/dashboard/search" method="post">
                            <div class="css-searchbar">
                                <input class="search-bar mr-sm-2" type="text" name = "cari" placeholder="Kelas apa yang kamu ingin ikuti hari ini?" width=100>
                                <a href="#" class="btn search-btn" name = "submit" type="submit">
                                    <img src="img/search.png">
                                </a>
                            </div>
                        </form>
                    </nav>
                    <div class="indexbtn" align="center">
                        <div class="btnregis" align="center">
                            <a href="/register" class="btn btn-dash-outline" type="button">DAFTAR</a>
                        </div>
                        <div class="btnmasuk" align="center">
                            <a href="/login" class="btn btn-dash" href="/login" type="button">MASUK</a>
                        </div>
                    </div>
            </div>
        </nav>
    </header>

    <!-- content -->
    <div class="contentclass" align="center">
        <?= $this->flashSession->output() ?>
        <div class="box-kelas">
            <div class="cover-mapel">
                <div class="mapel-judul" align="left">
                    <br><br><br>
                    <img src="img/course.png" width=60px>
                    <br><br>
                    <label class="judul" for="judul">Jenjang</label><br>
                    <label class="judul" for="judul">SD</label><br>
                    <br>
                    <label for="other">Lihat Info</label>
                    <a href='/kelas_sd' class="btn btn-link-other">
                        <img src="img/arrow.png" width=12px>
                    </a>
                </div>
                <?php $i = 1; ?>
                <?php foreach ($mapels as $mapel) { ?>
                <?php if ($mapel->img_src !== null && $mapel->jenjang_mapel === 'SD') { ?>

                <div class="mapel-<?= $i ?>" align="center">
                    <div class="<?= $mapel->class ?>">
                        <br><br>
                        <img src="img/<?= $mapel->img_src ?>" width=60px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="<?= $mapel->nama_mapel ?>"><?= $mapel->nama_mapel ?></label>
                        <br>
                        <a class="btn btn-primary:hover btn-join" href="dashboard/join/<?= $mapel->id_mapel ?>">
                            Join Kelas
                        </a>
                    </div>
                </div>
                <?php $i = $i + 1; ?>
                <?php } ?>
                <?php } ?>
            </div>
        </div>

        <div class="box-kelas box-2">
            <div class="cover-mapel">
                <div class="mapel-judul" align="left">
                    <br><br><br>
                    <img src="img/course.png" width=60px>
                    <br><br>
                    <label class="judul" for="judul">Jenjang</label><br>
                    <label class="judul" for="judul">SMP</label><br>
                    <br>
                    <label for="other">Lihat Info</label>
                    <a href='/kelas_smp' class="btn btn-link-other">
                        <img src="img/arrow.png" width=12px>
                    </a>
                </div>
                <?php $i = 1; ?>
                <?php foreach ($mapels as $mapel) { ?>
                <?php if ($mapel->img_src !== null && $mapel->jenjang_mapel === 'SMP') { ?>
                <div class="mapel-<?= $i ?>">
                    <div class="<?= $mapel->class ?>" align="center">
                        <br><br>
                        <img src="img/<?= $mapel->img_src ?>" width=80px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="<?= $mapel->nama_mapel ?>"><?= $mapel->nama_mapel ?></label>
                        <br>
                        <a class="btn btn-primary:hover btn-join" href="dashboard/join/<?= $mapel->id_mapel ?>">
                            Join Kelas
                        </a>
                    </div>
                </div>
                <?php $i = $i + 1; ?>
                <?php } ?>
                <?php } ?>
            </div>
        </div>

        <div class="box-kelas box-3">
            <div class="cover-mapel">
                <div class="mapel-judul" align="left">
                    <br><br><br>
                    <img src="img/course.png" width=60px>
                    <br><br>
                    <label class="judul" for="judul">Jenjang</label><br>
                    <label class="judul" for="judul">SMA</label><br>
                    <br>
                    <label for="other">Lihat Info</label>
                    <a href='/kelas_sma' class="btn btn-link-other">
                        <img src="img/arrow.png" width=12px>
                    </a>
                </div>
                <?php $i = 1; ?>
                <?php foreach ($mapels as $mapel) { ?>
                <?php if ($mapel->img_src !== null && $mapel->jenjang_mapel === 'SMA') { ?>
                <div class="mapel-<?= $i ?>">
                    <div class="<?= $mapel->class ?>" align="center">
                        <br><br>
                        <img src="img/<?= $mapel->img_src ?>" width=80px>
                    </div>
                    <div class="content-mapel" align="center">
                        <br>
                        <label for="<?= $mapel->nama_mapel ?>"><?= $mapel->nama_mapel ?></label>
                        <br>
                        <a class="btn btn-primary:hover btn-join" href="dashboard/join/<?= $mapel->id_mapel ?>">
                            Join Kelas
                        </a>
                    </div>
                </div>
                <?php $i = $i + 1; ?>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>