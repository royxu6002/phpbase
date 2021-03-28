<?php
Class Cart {
	
	var $sum =0; //目前购物车上的商品数量
	var $items; //购物车的商品

	//增加购物车上的物品
	function add_item ($goods_name){
		$this->sum++;
		$this->items['$this->sum'] = $goods_name;

	}

	//显示购物车上的商品
	function show_item (){

		for ($i=0;$i<$this->sum;$i++){

			echo $this->items[$i+1]."<br>";
		}
	}

}


?>