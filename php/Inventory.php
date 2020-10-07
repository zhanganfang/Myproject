<?php 
	//Connect to database
	$conn=mysqli_connect('localhost','root','root','xm_new');
	//execSQL
	$count = mysqli_query($conn,'select count(*) as count from inventory');
	//Into an array
	$count = mysqli_fetch_array($count);
	//Number of entries per page
	$pagesize = $_GET['limit'];
	//number of total pages
	$pagesum = ceil($count['count']/$pagesize);
	//Get current page
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	//Get offset
	$start = ($page-1)*$pagesize;
	//Determines whether the name exists
	if(!isset($_GET['name']))
	{
		//Perform SQL queries per page of data
		$data = mysqli_query($conn,"select * from inventory limit $start,$pagesize");
		//Into an array
		$data = mysqli_fetch_all($data,MYSQLI_ASSOC);
	}
	else if(empty($_GET['name']))
	{
		//Perform SQL queries per page of data
		$data = mysqli_query($conn,"select * from inventory limit $start,$pagesize");
		//Into an array
		$data = mysqli_fetch_all($data,MYSQLI_ASSOC);
	}
	else
	{
		//Perform SQL queries per page of data
		$data = mysqli_query($conn,"select * from inventory where name like '%".$_GET['name']."%' limit $start,$pagesize");
		//Into an array
		$data = mysqli_fetch_all($data,1);
		$count['count'] = count($data);
	}
	//Joining together the page number
	$pre = $page-1 < 1 ? 1 : $page-1;
	$next = $page+1 > $pagesum ? $pagesum : $page+1;
	//returned value 
	print_r(json_encode(['code'=>0,'msg'=>'查询成功','data'=>$data,'count'=>$count['count'],'pre'=>$pre,'next'=>$next]));
 ?>	