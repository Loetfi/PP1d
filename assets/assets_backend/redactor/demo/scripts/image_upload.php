<?php
 
// This is a simplified example, which doesn't cover security of uploaded images. 
// This example just demonstrate the logic behind the process. 
 
 
// files storage folder
// $dir = '/home/devprog/www/siaplulus.com/diskusi/artikel/'; 

$dir = 'C:seraweb\uploads\news\content'; 

// $dir = 'seraweb/uploads/news/content'; 
 
$_FILES['file']['type'] = strtolower($_FILES['file']['type']);
 
if ($_FILES['file']['type'] == 'image/png' 
|| $_FILES['file']['type'] == 'image/jpg' 
|| $_FILES['file']['type'] == 'image/gif' 
|| $_FILES['file']['type'] == 'image/jpeg'
|| $_FILES['file']['type'] == 'image/pjpeg')
{	
    // setting file's mysterious name 
    $filename = md5(date('YmdHis')).'.jpg';
    $file = $dir.$filename;

    // copying
    copy($_FILES['file']['tmp_name'], $file);

    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

    /*
    $config['base_url'] = $root;
    */
    // displaying file    
	$array = array(
		'filelink' => "../../../../seraweb/uploads/news/content".$filename
	);
	
	echo stripslashes(json_encode($array));   
    
}
 
?>