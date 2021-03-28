<?php
if(!empty($_FILES['img']))
{ 
    $sort=array("image/jpeg","image/jpg","image/gif","image/png");
    if((in_array($_FILES['img']['type'],$sort)) && ($_FILES['img']['size'] < 5*1024*1024))
    { 	
	    	$path = './upload/';
	        if (!file_exists($path))
	        {
	          mkdir($path);
	        } 

	      $time=date('YmdHis',time());
	      $file_name = explode('.',$_FILES['img']['name']);
	      $file_name[0] = $time;
	      $name = implode('.',$file_name);
	      $imgname = $path.$name;
	      move_uploaded_file($_FILES['img']['tmp_name'],$imgname); 
	      var_dump($imgname);
	      include "config.php";
	      $sql = "Insert into $my_goods(img) values('$imgname') where id=10";
	      $re = $my_conn->query($sql);
	      if($re)
	      {
	        echo "成功添加图片路径到数据库";
	      }   
	      else
	      {
	        echo "添加图片路径到数据库失败";
	      }

    } 
    else
    {
        echo "图片类型不符合或大小超过5Mb,未上传成功";
    }
}     
else
{
  echo "invalid file";
} 
?>
