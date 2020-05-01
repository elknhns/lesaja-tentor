<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Murid;
use App\Models\MataPelajaran;

class BookingController extends ControllerBase
{   
    public function indexAction(){

    }

    public function kelasAction()
    {
        $getUserId = $this->session->get('AUTH_ID');

        $query = $this->modelsManager->createQuery(
            "SELECT mp.nama_mapel, mp.jenjang, mp.nama_tentor FROM mata_pelajaran mp, kelas k, tentor t
                WHERE k.id_tentor = t.id_tentor AND k.id_mapel = mp.id_mapel = $getUserId");
        $listkelas= $query->execute();
        $kelas = $listkelas->toArray();

        $this->view->kelas = $kelas;
    }
}