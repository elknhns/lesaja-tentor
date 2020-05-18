<?php

namespace App\Controllers;
Use App\Models\Murid;

class EditProfilController extends ControllerBase
{
    public function indexAction()
    {
       
            // echo "Hello World";
            // $this->view->disable();

        // $db = $this->getDI()->get('db');

        // $sql = "SELECT * from murid";

        // $result = $db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

        // echo var_dump($result);
    }

    public function editSubmitAction(){

        if ($this->request->isPost()) 
        {
            $nama_murid = $this->request->getPost("nama");
            $email = $this->request->getPost("email");

            if ($nama_murid === null && $email === null)
            {
                $this->flashSession->error("Data tidak boleh kosong");
                //pick up the same view to display the flash session errors
                return $this->response->redirect('edit');
            }
            $exist = Murid::findFirst(
                [
                    'conditions' => 'email = :email:',
                    'bind'       => [
                        'email' => $email,
                    ],
                ]
            );

            if (!$exist)
            {
                $this->flashSession->error("Email anda belum diubah");
                return $this->response->redirect('edit');
            }

            else
            {
                if($nama_murid === $exist->nama_murid)
                {
                    $this->flashSession->error("Email anda belum diubahjjjjjjj");
                    return $this->response->redirect('editprofil');
                }
                else
                {
                    // set value
                    $exist->nama_murid = $nama_murid;
                    $exist->email = $email;
                    
                    // Store and check for errors
                    $success = $exist->update();
                    $this->flashSession->success("Data diri berhasil diubah!");
                    return $this->response->redirect('dashboard');
                }
            }
        }
        
    }

}