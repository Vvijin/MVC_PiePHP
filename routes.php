<?php

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/user/add', ['controller' => 'user', 'action' => 'add']);