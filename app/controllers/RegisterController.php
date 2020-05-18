<?php  
declare(strict_types=1);

namespace App\Controllers;

Use App\Models\Murid;

class RegisterController extends ControllerBase
{  
    public function indexAction(){

    }
     
    public function registerSubmitAction(){
        $user = new Murid();

        // get value
        $nama_murid = $this->request->getPost('nama', 'string');
        $email = $this->request->getPost('email', 'string');
        $password = $this->request->getPost('password', 'string');
        $confirm = $this->request->getPost('confirm', 'string');

        $exist = Murid::findFirst(
            [
                'conditions' => 'email = :email:',
                'bind'       => [
                    'email' => $email,
                ],
            ]
        );

        if ($exist){
            $this->flashSession->error("Email telah terdaftar");
            $this->response->redirect('register');
        }

        else{
            if ($password != $confirm){
                $this->flashSession->error("Password tidak cocok");
                $this->response->redirect('register');
                return false;
            }
            else{
                // set value
                $user->nama_murid = $nama_murid;
                $user->email = $email;
                $user->password = $password;

                $success = $user->save();
                $this->flashSession->success("Berhasil terdaftar!");

                // Log the user/admin in
                if ($success) {
                    // Set a session
                    $this->session->set('AUTH_ID', $user->id_murid);
                    $this->session->set('AUTH_NAME', $user->nama_murid);
                    $this->session->set('AUTH_EMAIL', $user->email);
                    $this->session->set('AUTH_PASS', $user->password);  

                    $this->response->redirect("/dashboard");
                    
                    // Go to User
                    // if ($user->roles == 0) 
                    // {
                    //     $this->response->redirect("/dashboard");
                    // } 
                    }
                    // Exit 
                else
                {
                    return $this->response->redirect('login');
                }
            }
        }
     }
}     