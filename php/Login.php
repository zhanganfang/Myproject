<?php 
	//Connect to database
	$conn=mysqli_connect('localhost','root','root','xm_new');
	//SQL sentence
	$sql = "select * from admin where name='".$_POST['name']."'";
	//execSQL
	$data = mysqli_query($conn,$sql);
	//To a one-dimensional array
	$data = mysqli_fetch_assoc($data);
	//Determine if the password is correct
	if($data['pwd'] == md5($_POST['pwd']))
	{
		$array = ['code'=>0,'msg'=>'修改成功','data'=>''];
	}
	else
	{
		$array = ['code'=>1,'msg'=>'修改失败','data'=>''];
	}
	//returned value
	print_r(json_encode($array['code']));
 ?>	