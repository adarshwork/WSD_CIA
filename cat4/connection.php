<?php
$link=mysqli_connect("localhost","root","","christ");
/*check connection*/
if(mysqli_connect_errno())
{
echo"Connection Fail". mysqli_connect_error();
}
?>