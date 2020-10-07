<?php 
	//Connect to database
	$conn=mysqli_connect('localhost','root','root','xm_new');
	//SQL sentence
	$sql = "update inventory set name='".$_POST['name']."',type='".$_POST['type']."',unit_price='".$_POST['unit_price']."',inventory='".$_POST['inventory']."' where id=$_POST[id]";
	//execSQL
	$count = mysqli_query($conn,$sql);
	//returned value
	print_r(json_encode(['code'=>0,'msg'=>'修改成功','data'=>'']));
 ?>	