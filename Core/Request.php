<?php

class Request
{
    private $request_post;

    public function __construct()
    {
        if (!empty($_REQUEST)) {
            foreach ($_REQUEST as $key => $values) {
                //echo $key. '=' .$values .'<br>';
                $_REQUEST[$key] = stripslashes(trim(htmlspecialchars($values)));
            }
            $this->request_post = $_REQUEST;
            //var_dump($this->request_post);
        }
    }

    public function getQueryParams()
    {
        $post = $this->request_post;
        return($post);
    }
}
