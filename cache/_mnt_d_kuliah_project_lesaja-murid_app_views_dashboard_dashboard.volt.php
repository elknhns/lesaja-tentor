<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lesaja</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/responsive.css">
</head>
<body class="full">
    <?= $this->flashSession->output() ?>
    <header class="headerapi" align="center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand"><img src="img/lesaja.png" width=120></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto align-middle">
                    <li class="nav-item align-middle" align="center">
                        <div class="kelasaya" align="center"> 
                            <a href="/kelas" align="center">Kelas Saya<span class="sr-only"></a>
                        </div>
                    </li>
                    <div class="tengah">
                        <form name="form" action="/dashboard/search" method="post">
                            <div class="align-middle">
                                <input class="search-bar1 mr-sm-2 " type="text" name = "cari" placeholder="Kelas apa yang kamu ingin ikuti hari ini?" width=100>
                            </div>
                            <div class="search-btn1">
                                <button class="btn" name = "submit" type="submit">
                                    <img src="img/search.png" width=20>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="infotentor">
                        <a href="/tentor" for="tentor">Temukan tentormu</a>
                    </div>
                    <li>
                        <label class="nama1" for="nama_murid"><?php $hasil=explode(' ',$this->session->get('AUTH_NAME'),2); echo $hasil[0]; ?></label>
                    </li>
                    <li class="rightnav">
                        <button class="btn dropdwon-toggle" id="nama_murid" data-toggle="dropdown">
                            <img src="img/user.png">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/editprofil">Edit Profile</a>
                            <a class="dropdown-item" href="/logout">Keluar</a>
                        </div>
                    </li>
            </div>
        </nav>
    </header>
        
    <!-- content -->
    <div class="mainn align-items-baseline">
        <div class="box-kelas">
            <div class="cover-mapel1">
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
                <?php if ($mapel->icon !== null && $mapel->jenjang_mapel === 'SD') { ?>

                <div class="mapel-<?= $i ?>" align="center">
                    <div class="<?= $mapel->class ?>">
                        <br><br>
                        <img src="img/<?= $mapel->icon ?>" width=60px>
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
                <?php if ($mapel->icon !== null && $mapel->jenjang_mapel === 'SMP') { ?>
                <div class="mapel-<?= $i ?>">
                    <div class="<?= $mapel->class ?>" align="center">
                        <br><br>
                        <img src="img/<?= $mapel->icon ?>" width=80px>
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
                <?php if ($mapel->icon !== null && $mapel->jenjang_mapel === 'SMA') { ?>
                <div class="mapel-<?= $i ?>">
                    <div class="<?= $mapel->class ?>" align="center">
                        <br><br>
                        <img src="img/<?= $mapel->icon ?>" width=80px>
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