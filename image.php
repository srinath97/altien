<!DOCTYPE html>
<html lang="en">
<?php
require_once('db.php');
$q="SELECT * from faculty;";
$re=mysqli_query($stat,$q);
ini_set('max_execution_time', 3000);
while($r=mysqli_fetch_array($re))
{
	$facid = $r['facid'];
	$url = 'http://sastra.edu/staffprofiles/upload/' . $facid.'.jpg';
	//$hash=(($facid%100)+37).md5($facid).($facid-118000000);
	if(!file_exists("img/faculty/civil/$facid.jpg"))
    {
	    if(copy($url,"img/faculty/civil/$facid.jpg"))
	    {
	    	echo $facid;?><br><?php	
		}
	}	    
}
?>
</html>