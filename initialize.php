<?php
$dev_data = array('id'=>'-1','firstname'=>'Developer','lastname'=>'','username'=>'admin','password'=>'81dc9bdb52d04dc20036dbd8313ed055','last_login'=>'','date_updated'=>'','date_added'=>'');

if($_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "localhost"){
if(!defined('base_url')) define('base_url','http://localhost/pms/');
if(!defined('DB_SERVER')) define('DB_SERVER',"localhost");
if(!defined('DB_USERNAME')) define('DB_USERNAME',"root");
if(!defined('DB_PASSWORD')) define('DB_PASSWORD',"");
if(!defined('DB_NAME')) define('DB_NAME',"pms_db");
}else{
    if(!defined('base_url')) define('base_url','https://prison.genderise.biz/pms/');
    if(!defined('DB_SERVER')) define('DB_SERVER',"localhost");
    if(!defined('DB_USERNAME')) define('DB_USERNAME',"genderis_pms_db");
    if(!defined('DB_PASSWORD')) define('DB_PASSWORD',"V*?W@z;4U@kuD6T");
    if(!defined('DB_NAME')) define('DB_NAME',"genderis_pms_db");
}
if(!defined('base_app')) define('base_app', str_replace('\\','/',__DIR__).'/' );
// if(!defined('dev_data')) define('dev_data',$dev_data);

?>
