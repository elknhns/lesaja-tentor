<?php
declare(strict_types=1);

namespace App\Controllers;
Use App\Models\Tentor;

class LoginController extends ControllerBase{
    public function indexAction(){
    }

    public function loginSubmitAction(){

        // Jika menekan tombol Masuk
        if ($this->request->isPost()) {
            $email_input = $this->request->getPost("email");
            $password_input = $this->request->getPost("password");

            if ($email_input === "" && $password_input === ""){
                $this->flashSession->error("Anda belum mengisi email dan password");
                return $this->view->pick("login/index");
            }

            if ($email_input === "") {
                $this->flashSession->error("Isi email anda");
                //pick up the same view to display the flash session errors
                return $this->view->pick("login/index");
            }

            if ($password_input === "") {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("login/index");
            }

            $exist = Tentor::findFirst([ 
                'email_tentor = :email:',
                'bind' => [
                   'email' => $email_input,
                ]
            ]);

            if ($exist) {
                if ($password_input === $exist->password_tentor){
                    $this->session->set('AUTH_ID', $exist->id_tentor);
                    $this->session->set('AUTH_NAME', $exist->nama_tentor);
                    $this->session->set('AUTH_EMAIL', $exist->email_tentor);
                    $this->session->set('AUTH_PASS', $exist->password_tentor);   
                    return $this->response->redirect('/index');
                } else {
                    // The validation has failed
                    $this->flashSession->error("Password Salah");
                    return $this->response->redirect('login');
                }
            } else {
                // The validation has failed
                $this->flashSession->error("User tidak terdaftar");
                return $this->response->redirect('login');
            }
        }
    }
}