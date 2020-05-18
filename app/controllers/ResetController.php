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
            $email = $this->request->getPost("email");
            $password = $this->request->getPost("old_pwd");
            $confirm = $this->request->getPost("new_pwd");

            if ($password === "" && $confirm === "")
            {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("reset/index");
            }

            // get value
            $email = $this->request->getPost('email', 'string');
            $password = $this->request->getPost('old_pwd', 'string');
            $confirm = $this->request->getPost('new_pwd', 'string');

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
                $this->flashSession->error("Email anda salah");
                return $this->response->redirect('reset');
            }

            else
            {
                if($password !== $exist->password)
                {
                    return $this->response->redirect('reset');
                }
                else
                {
                    // set value
                    $exist->email = $email;
                    $exist->password = $confirm;
                    
                    // Store and check for errors
                    $success = $exist->update();
                    $this->flashSession->success("Password berhasil diubah!");
                    return $this->response->redirect('login');
                }
            }
        }
    }
}