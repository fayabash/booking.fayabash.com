<?php

Router::connect('/', array('controller' => 'artists', 'action' => 'index'));
Router::connect('/admin', array('controller' => 'artists', 'action' => 'index','admin' => true));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
Router::connect('/artist/*', array('controller' => 'artists', 'action' => 'view'));


CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
