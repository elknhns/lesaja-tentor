<?php  
declare(strict_types=1);

namespace App\Controllers;

Use App\Models\Kelas;
Use App\Models\Mapel;

class CreateClassController extends ControllerBase {  
    public function indexAction() {

    }
     
    public function createClassSubmitAction() {
        $kelas = new Kelas();

        // get value
        $id_tentor = $this->session->get('AUTH_ID');
        $jenjang = $this->request->getPost("jenjang");
        $nama_mapel = $this->request->getPost("mapel");

        $exist = Mapel::findFirst(
            [
                'conditions' => 'nama_mapel = ?1 AND jenjang = ?2',
                'bind'       => [
                    1 => $nama_mapel,
                    2 => $jenjang
                ],
            ]
        );

        if (!$exist){
            $this->flashSession->error("Mata pelajaran dalam jenjang yang diminta tidak tersedia");
            $this->response->redirect('createclass');
        } else {
            // set value
            $kelas->id_mapel = $exist->id_mapel;
            $kelas->id_tentor = $id_tentor;

            $success = $kelas->save();
            // var_dump($success); 

            // Notify the user
            if ($success) {
                $this->flashSession->success("Kelas berhasil dibuat!"); 
                return $this->response->redirect("/index");

            } else {
                $this->flashSession->error("Kelas gagal dibuat"); 
                return $this->response->redirect('createclass');
            }
        }
    }
}     