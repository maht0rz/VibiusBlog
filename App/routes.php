<?php

/*
	VibiusPHP Router

*/

Router::setRoutes(array(
	'post/{id}' => 'postController@post',
	'add' => 'postController@add',
    '/' => 'postController@welcome'
));

