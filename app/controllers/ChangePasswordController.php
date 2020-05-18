<?php


namespace App\Controllers;
Use App\Models\Murid;

class ChangePasswordController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function changeSubmitAction(){
        if ($this->request->isPost()) 
        {
            $password = $this->request->getPost("old-pwd");
            $confirm = $this->request->getPost("new-pwd");
            $confirm1 = $this->request->getPost('new-pwd1');

            if ($password === null)
            {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("changepassword/index");
            }            

            

            $exist = Murid::findFirst(
                [
                    'conditions' => 'password = :pwd:',
                    'bind'       => [
                        'pwd' => $password, //eh
                    ],
                ]
            );

            if (!$exist)
            {
                $this->flashSession->error("Password anda salah ".$password);
                return $this->response->redirect('changepassword');
            }

            else
            {
                if($confirm !== $confirm1){
                    $this->flashSession->error("Password tidak cocok");
                    return $this->response->redirect('changepassword');
                }

                if($password !== $exist->password)
                {
                    return $this->response->redirect('changepassword');
                }
                else
                {
                    // set value
                    $exist->password = $confirm;
                    
                    // Store and check for errors
                    $success = $exist->update();
                    $this->flashSession->success("Password berhasil diubah!");
                    return $this->response->redirect('dashboard');
                }
            }
        }
    }

}