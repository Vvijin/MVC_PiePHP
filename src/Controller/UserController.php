<?php

class UserController extends Controller
{

    public function indexAction()
    {
    $this->render("index");
        echo 'Salut';
    }

    public function addAction()
    {

        echo 'Ajouté';
    }

    public function errorAction()
    {
        echo '404';
    }

    public function registerAction()
    {
        //var_dump($_POST);
        //echo 'YESSSS';
        $this->render('register');
        //if($_POST['col'] && $_POST['value_col'])
        
            //$user = new UserModel('users', $_POST);
            $pm = ['WHERE' => 'id = 1', 'ORDER BY' => 'id ASC'];
            $user = new UserModel('users', $pm);
            $user->find();
        
       
    }
}
