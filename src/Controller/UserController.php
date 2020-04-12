<?php

class UserController extends Controller
{

    public function indexAction()
    {
    // $this->render("index");
    //     echo 'Salut';
    $user = new UserModel(['id' => '1']);
    //var_dump($user);
    // $result = substr('ModelUser',5);
    // echo $result;

    }

    public function addAction()
    {

        echo 'Ajouté';
    }

    public function errorAction()
    {
        echo '404';
    }

    public function deleteAction()
    {
        echo 'Au revoir';
    }

    public function registerAction()
    {
        //var_dump($_POST);
        // $this->request = new Request();
        //  $params = $this->request->getQueryParams() ;
        // $user = new UserModel($params);
        // //var_dump($params);
        //$user->get_relations();
    
        
        
        //$pm = ['WHERE' => 'id = 1', 'ORDER BY' => 'id ASC'];
        //$user = new UserModel('users', $pm);
        $user = new UserModel($_POST);
       

        if(!$user->checkmail('email')) {
    
           echo "Votre compte à été crée.";
           $user->create();
        }
           else{
               echo "Votre compte existe déjà";
           }
           $this->render('register');
         

    }
}
