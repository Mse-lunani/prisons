<?php
include_once '../../operations.php';
include_once '../../initialize.php';
include_once '../vendor/email.php';
$html = file_get_contents('../email_templates/password_send.html');
$password = rand(1000, 9999);
$_POST['password'] = md5($password);
$html = str_replace('{password}', $password, $html);
$link = base_url . 'admin/login.php';
$html = str_replace('{link}', $link, $html);

$conn = connect();
$m['status'] = 'failed';
$m['msg'] = 'Error';
$m['data'] = $_POST;
$m['con'] = $conn;
if($_POST['id'] == ""){
    unset($_POST['id']);
}

if(insert_edit_form("officers")) {
    $sql = "select * from officers order by id desc ";
    $rows = select_rows($sql);
    $id = $rows[0]['id'];
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    $m['status'] = 'success';
    $m['msg'] = 'Data successfully saved.';
    $m['id'] = $id;
    send_email($_POST['email'], 'Account Created', $html);
}
echo json_encode($m);