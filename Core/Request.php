<?php

class Request
{
    private $request_get;
    private $request_post;

    public function __construct()
    {
        if (!empty($_GET)) {
            foreach ($_GET as $key => $values) {
                $this->request_post = stripslashes(trim(htmlspecialchars($values)));
            }
        }

        if (!empty($_POST)) {
            foreach ($_POST as $key => $values) {
                $this->request_post = stripslashes(trim(htmlspecialchars($values)));
            }
        }
    }

//     public function getQueryParams()
//     {
//         $get = $this->request_get;
//         $post = $this->request_post;
//         return array($get, $post);
//     }
}
