<?php
/**
 * Created by PhpStorm.
 * User: iman
 * Date: 7/2/16
 * Time: 3:22 AM
 */

require_once('../includes/initialize.php');
$errors = array();
$temp_path = "";
$file_name = "";
$target_path = "";
$upload_errors = array(
    UPLOAD_ERR_OK => "No errors.",
    UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
    UPLOAD_ERR_FORM_SIZE => "Larger than MAX_FILE_SIZE.",
    UPLOAD_ERR_PARTIAL => "Partial upload.",
    UPLOAD_ERR_NO_FILE => "No file.",
    UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
    UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
    UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
);
attach_file($_FILES['photo']);
if(save()) {
    $user = User::find_by_id($session->user_id);
    $user->image = $target_path;
    $user->update();
    redirect_to("profile.php");
}
function attach_file($file)
{
    global $temp_path;
    global $file_name;
    if (!$file || empty($file) || !is_array($file)) {
        $errors[] = "No file was uploaded.";
        return false;
    } elseif ($file['error'] != 0) {
        $errors[] = upload_errors[$file['error']];
        return false;
    } else {
        $temp_path = $file['tmp_name'];
        $file_name = basename($file['name']);
        return true;
    }
}

function save()
{
    global $session;
    global $temp_path;
    global $file_name;
    global $target_path;
    if (!empty($errors))
        return false;
    if (empty($file_name) || empty($temp_path)) {
        $errors[] = "The file location was not available.";
        return false;
    }
    $target_path = "images" . DS . $session->user_id . $file_name;
    if (move_uploaded_file($temp_path, $target_path)) {
        return true;
    } else {
        $errors[] = "This file upload failed, possibly due to
                    incorrect permissions on the upload dir.";
        return false;
    }

}
