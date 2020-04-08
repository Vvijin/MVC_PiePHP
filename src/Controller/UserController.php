<?php

class UserController
{

    public function indexAction()
    {
    //$this->render("index");
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
        //$this->render('register');
        if($_POST['col'] && $_POST['value_col'])
        {
            $user = new UserModel($_POST, 'users');
            //$user->save();
        }
       
    }
}
