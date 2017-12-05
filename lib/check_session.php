<?php 
session_start() ;
if(!isset($_SESSION['username'])){
	echo "<script language='javascript'>";
			echo "location.href='./trang-dang-nhap.php';</script>";
                                      
                                   
}
?>