<?php
//简单的会员认证类
class member_class {

	var $name="tgs";
	var $password="13579";
	var $adopt=false;

	function chkpasw($tname, $pasw){
		if($tname==$this->name && $pasw==$this->password){
			echo "登录通过";
			$this->adopt=true;
		} else{
			echo "登录失败";
			$this->adopt=false;
		}
		return $this->adopt;
	}

}

?>