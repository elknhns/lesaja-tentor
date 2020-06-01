<?php  
declare(strict_types=1);

namespace App\Controllers;

Use App\Models\Tentor;

class RegisterController extends ControllerBase {  
    public function indexAction() {

    }
     
    public function registerSubmitAction() {
        $user = new Tentor();
        
        // get value
        $nama_tentor = $this->request->getPost('nama', 'string');
        $email_tentor = $this->request->getPost('email', 'string');
        $password_tentor = $this->request->getPost('password', 'string');
        $confirm = $this->request->getPost('confirm', 'string');

        $exist = Tentor::findFirst([
                'conditions' => 'email_tentor = :email:',
                'bind'       => [
                    'email' => $email_tentor,
                ],
            ]
        );

        if ($exist) {
            $this->flashSession->error("Email telah terdaftar");
            $this->response->redirect('register');
        } else {
            if ($password_tentor != $confirm) {
                $this->flashSession->error("Password tidak cocok");
                $this->response->redirect('register');
                return false;
            } else {
                // set value
                $user->nama_tentor = $nama_tentor;
                $user->email_tentor = $email_tentor;
                $user->password_tentor = $password_tentor;

                $success = $user->save(); 

                // Log the user
                if ($success) {
                    $this->flashSession->success("Berhasil terdaftar!");
                    // Set a session
                    $this->session->set('AUTH_ID', $user->id_tentor);
                    $this->session->set('AUTH_NAME', $user->nama_tentor);
                    $this->session->set('AUTH_EMAIL', $user->email_tentor);
                    $this->session->set('AUTH_PASS', $user->password_tentor);  
                    
                    $this->response->redirect("/index");

                } else {
                    $this->flashSession->error("Akun gagal didaftarkan");
                    return $this->response->redirect('register');
                }
            }
        }
     }
}     