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
        if($_POST['email'] && $_POST['password'])
        {
            $user = new UserModel($_POST['email'], $_POST['password']);
            $user->save();
        }
       
    }
}
