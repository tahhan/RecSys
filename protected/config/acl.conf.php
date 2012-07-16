<?php

$acl['admin']['allow'] = '*';

$acl['anonymous']['allow'] = array(
    'AppController' => '*',
    'UserController' => array('login', 'login_submit', 'signup', 'signup_submit')
);

$acl['anonymous']['deny'] = '*';

$acl['employer']['allow'] = array(
    'EmployerController' => '*',
    'DeptController' => '*',
    'AppController' => '*',
    'UserController' => array('logout', 'login', 'login_submit')
);

$acl['seeker']['allow'] = array(
    'AppController' => '*',
    'SeekerController' => '*',
    'UserController' => array('logout', 'login', 'login_submit')
);

?>