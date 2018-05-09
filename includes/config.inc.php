<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

global $config;

$config['smarty']['template_dir'] =
'templates/main/template/';
$config['smarty']['compile_dir'] =
'templates/main/templates_c/';
$config['smarty']['config_dir'] =
'templates/main/configs/';
$config['smarty']['cache_dir'] =
'templates/main/cache/';

$config['debug']=false;
$config['mysql']['user'] = 'root';
$config['mysql']['password'] = 'asdasd';
$config['mysql']['host'] = 'localhost';
$config['mysql']['database'] = 'bookstore';

//configurazione server smtp per invio email
$config['smtp']['host'] = 'smtp.cheapnet.it';
$config['smtp']['port'] = '25';
$config['smtp']['smtpauth'] = false;
$config['smtp']['username'] = '';
$config['smtp']['password'] = '';

$config['email_webmaster']='webmaster@bookstore.lamjex.com';
$config['url_bookstore']='http://localhost/bookstore2/';

function debug($var){
    global $config;
    if ($config['debug']){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

?>
