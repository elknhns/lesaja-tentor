<?php
declare(strict_types=1);

namespace App\Controllers;

Use App\Models\Murid;
Use App\Models\Mapel;
Use App\Models\Kelas;

class DashboardController extends ControllerBase
{
    public function indexAction()
    {   
        if(!$this->session->has('AUTH_ID')){
            $this->flashSession->error("Not Authorized");
            return $this->response->redirect('login');
        }
        $this->view->mapels=Mapel::find();
        $this->view->pick('dashboard/dashboard');
    }

    public function joinAction($id)
    {   
        $cari=Mapel::findFirst([
            'id_mapel = :id:',
                'bind' => [
                    'id' => $id,
                ]
        ]);

        $kelas = new Kelas();
        $kelas->id_mapel=$id;
        $kelas->id_tentor=$cari->id_tentor;
        $kelas->id_murid=$this->session->get('AUTH_ID');

        $success = $kelas->save();

        if ($success) {
            $this->flashSession->success("Berhasil join kelas");;
            return $this->response->redirect('/dashboard');
        } else {
            $this->flashSession->error("Gagal join kelas");
            return $this->response->redirect('/dashboard');
        }
    }
}