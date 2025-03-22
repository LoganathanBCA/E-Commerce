<?php 
session_start();
include "config.php";
$data = array();

if(isset($_GET['files']))
{  
    $error = false;
    $files = array();

    $uploaddir = 'uploads/';
    foreach($_FILES as $file)
    {
		$name=$uploaddir .time().basename($file['name']);
        if(move_uploaded_file($file['tmp_name'],$name ))
        {
            $files[] = $uploaddir .$name;
            $a = $name;
			$sql="insert into bulkorder (UID,FNAME,LOGS) values ({$_SESSION["UID"]},'{$a}',NOW());";
			$con->query($sql);
        }
        else
        {
            $error = true;
        }
    }
    $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
}
else
{
    $data = array('success' => 'Form was submitted', 'formData' => $_POST);
}

echo json_encode($data);

?>