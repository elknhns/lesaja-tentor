<?php  

namespace App\Controllers;
Use App\Models\Murid;

class ResetController extends ControllerBase  
{  
    public function indexAction()   
    {  
        
    }  

    public function resetSubmitAction()
    {
        if ($this->request->isPost()) 
        {
            $email_murid = $this->request->getPost("email");
            $password_murid = $this->request->getPost("old_pwd");
            $confirm = $this->request->getPost("new_pwd");

            if ($password_murid === "" && $confirm === "")
            {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("reset/index");
            }

            // get value
            $email_murid = $this->request->getPost('email', 'string');
            $password_murid = $this->request->getPost('old_pwd', 'string');
            $confirm = $this->request->getPost('new_pwd', 'string');

            $exist = Murid::findFirst(
                [
                    'conditions' => 'email_murid = :email:',
                    'bind'       => [
                        'email' => $email_murid,
                    ],
                ]
            );

            if (!$exist)
            {
                $this->flashSession->error("Email anda salah");
                return $this->response->redirect('reset');
            }

            else
            {
                if($password_murid !== $exist->password_murid)
                {
                    return $this->response->redirect('reset');
                }
                else
                {
                    // set value
                    $exist->email_murid = $email_murid;
                    $exist->password_murid = $confirm;
                    
                    // Store and check for errors
                    $success = $exist->update();
                    $this->flashSession->success("Password berhasil diubah!");
                    return $this->response->redirect('login');
                }
            }
        }
    }
}