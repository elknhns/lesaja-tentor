<?php  
declare(strict_types=1);

namespace App\Controllers;

Use App\Models\Tentor;

class ChangePassController extends ControllerBase
{  
    public function indexAction() {

    }
     
    public function changePassSubmitAction()
    {
        if ($this->request->isPost()) 
        {
            $password_tentor = $this->request->getPost("old-pwd-ten");
            $confirm = $this->request->getPost("new-pwd-ten");
            $confirm1 = $this->request->getPost('new-pwd1-ten');

            if ($password_tentor === null)
            {
                $this->flashSession->error("Password anda kosong");
                //pick up the same view to display the flash session errors
                return $this->view->pick("changepass/index");
            }            
            $exist = Tentor::findFirst(
                [
                    'conditions' => 'password_tentor = :pwd:',
                    'bind'       => [
                        'pwd' => $password_tentor,
                    ],
                ]
            );

            if (!$exist)
            {
                $this->flashSession->error("Password anda salah ");
                return $this->response->redirect('changepass');
            }

            else
            {
                if($confirm !== $confirm1){
                    $this->flashSession->error("Password tidak cocok");
                    return $this->response->redirect('changepass');
                }

                if($password_tentor !== $exist->password_tentor)
                {
                    return $this->response->redirect('changepass');
                }
                else
                {
                    // set value
                    $exist->password_tentor = $confirm;
                    
                    // Store and check for errors
                    $success = $exist->update();
                    $this->flashSession->success("Password berhasil diubah!");
                    return $this->response->redirect('index');
                }
            }
        }
        
    }
}     