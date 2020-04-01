<?php

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/user/add', ['controller' => 'user', 'action' => 'add']);
Router::connect('/user/error', ['controller' => 'user', 'action' => 'error']);
Router::connect('/register', ['controller'=>'user','action'=>'add']);