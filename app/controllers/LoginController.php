<?php
declare(strict_types=1);

namespace App\Controllers;
Use App\Models\Murid;

class LoginController extends ControllerBase{
    public function indexAction(){
    }

    public function loginSubmitAction(){

        if($this->session->has('AUTH_ID')){
            $this->flashSession->error("Already Login");
            return $this->response->redirect('dashboard');
        }

        if ($this->request->isPost()) {
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("password");

            if ($email === "" && $password === ""){
                $this->flashSession->error("Anda belum mengisi email dan password");
                return $this->view->pick("login/index");
            }

            if ($email === "") {
                $this->flashSession->error("Isi email anda");
                //pick up the same view to display the flash session errors
                return $this->view->pick("login/index");
            }

            if ($password === "") {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("login/index");
            }

            $user = Murid::findFirst([ 
                'email = :email:',
                'bind' => [
                   'email' => $email,
                ]
            ]);

            if ($user) {
                if ($password === $user->password){
                    $this->session->set('AUTH_ID', $user->id_murid);
                    $this->session->set('AUTH_NAME', $user->nama_murid);
                    $this->session->set('AUTH_EMAIL', $user->email);
                    $this->session->set('AUTH_PASS', $user->password);   

                    return $this->response->redirect('/dashboard');
                }
            } else {
                // The validation has failed
                $this->flashSession->error("User tidak terdaftar");
                return $this->response->redirect('login');
            }
            // The validation has failed
            $this->flashSession->error("Password Salah");
            return $this->response->redirect('login');
        }
    }
}