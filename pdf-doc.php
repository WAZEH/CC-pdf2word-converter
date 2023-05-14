
<?php



$key=$_REQUEST['key'];

$sfile=$_REQUEST['sfile'];

$tfile=$_REQUEST['tfile'];
$purl=$_REQUEST['purl'];



if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "../uploads/".$_FILES['userImage']['name'];
$filepath="uploads/".$_FILES['userImage']['name'];
$filename=$_FILES['userImage']['name'];
move_uploaded_file($sourcePath,$targetPath);

$pf = preg_replace('/\s+/', '', $filepath);

$file2='http://www.freeonlinepdfconverters.com/'.$filepath;
}
}

if($key=='Gd243vdfgdfgfdgfd55554GFFDGFDGSGSDsaDSF' && !empty($file) )
{

	
date_default_timezone_set('Asia/Kolkata');
$date= date('d-m-Y H:i');

$purl=getprocessid();


include "../connection.php";
$qry="INSERT INTO `convertion-logs` (`id`, `input`, `output`, `c_from`, `c_to`, `type`, `date`) 
VALUES (NULL, '$file2', '$purl', '$sfile', '$tfile', 'conver', '$date');";

$res=mysqli_query($con,$qry);
if($res)
{
 
$arr = array('p' =>$purl,'file'=>$file2);

echo json_encode($arr);




}
else
{
	echo "sorry Try Again";
}







}





function setconversion($file2,$purl)
{
$post = [
    'input' => 'download',
    'file' => $file2,
    'outputformat'   => 'doc',  


  
 
];

$ch = curl_init($purl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);


$response = curl_exec($ch);


curl_close($ch);


$json = json_decode($response, true);


$url=$json['url'];



return $url;
}


function getprocessid()
{
$post = [
    'apikey' => 'vcLhis-exdcoGmnwhSmVzMHl50ytw0MeUHfKE9jKeA8gm2uNLecsws8rGxRWQ_8kDUcVAhLPfFtkhxgvMWLriw',
    'inputformat' => 'pdf',
    'outputformat'   => 'doc',  


  
 
];

$ch = curl_init('https://api.cloudconvert.com/process');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);


$response = curl_exec($ch);


curl_close($ch);


$json = json_decode($response, true);


return $url=$json['url'];





}






?>







