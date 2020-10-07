<?php 
	//The header file sets the encoding format
	header("content-type:text/html;charset=utf-8");
	//Connect to database
	$conn=mysqli_connect('localhost','root','root','xm_new');	
	//SQL sentence
	$sql = "select *from inventoryInfo where id=$_GET[id]";
	//execSQL
	$data = mysqli_query($conn,$sql);
	//To a one-dimensional array
	$data = mysqli_fetch_assoc($data);
	//Print and return data successfully
	print_r('Sell today：'.$data['today_sale'].', Inventory is left : '.$data['inventoryNum']);

 ?>