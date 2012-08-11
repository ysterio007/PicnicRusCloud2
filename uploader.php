<?php
       
    //$ftp_server='213.244.127.138';//serverip
// FTP access parameters
$host = '67.220.217.235';//'1081443.studentswebprojects.ritaj.ps';//213.244.127.138';//1081443.studentswebprojects.ritaj.ps';//'ftp.example.org';

    $usr="ahmadhammad_zxq";
    $pwd="123456789a";
// file to move:
$local_file = './init2.php';
$ftp_path = './';
 // FTP access parameters
//$host = 'ftp.example.org';
$usr = 'example_user';
$pwd = 'example_password';
 
// file to move:
//$local_file = './example.txt';
//$ftp_path = '/data/example.txt';
 
// connect to FTP server (port 21)
if($conn_id = ftp_connect($host, 21) )//or die ("Cannot connect to host")
{
echo $conn_id."conected";
}
 
// send access parameters
if(ftp_login($conn_id, $usr, $pwd) )
{
echo "logged";
}//or die("Cannot login");
 
// turn on passive mode transfers (some servers need this)
// ftp_pasv ($conn_id, true);
 
// perform file upload
$upload = ftp_put($conn_id, $ftp_path, $local_file, FTP_ASCII);
 
// check upload status:
print (!$upload) ? 'Cannot upload' : 'Upload complete';
print "\n";
 
/*
** Chmod the file (just as example)
*/
 
// If you are using PHP4 then you need to use this code:
// (because the "ftp_chmod" command is just available in PHP5+)
if (!function_exists('ftp_chmod')) {
   function ftp_chmod($ftp_stream, $mode, $filename){
        return ftp_site($ftp_stream, sprintf('CHMOD %o %s', $mode, $filename));
   }
}
 
// try to chmod the new file to 666 (writeable)
if (ftp_chmod($conn_id, 0666, $ftp_path) !== false) {
    print $ftp_path . " chmoded successfully to 666\n";
} else {
    print "could not chmod $file\n";
}
 
// close the FTP stream
ftp_close($conn_id);