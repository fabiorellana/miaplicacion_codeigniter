<?php
class Articulo_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function dame_ultimos_articulos(){
		$ssql = "select * from articulo order by id desc limit 5";
		return mysql_query($ssql);
	}

	public function dame_articulo($id){
		$ssql = "select * from articulo where id=" .$id;
		$rs = mysql_query($ssql);
		if(mysql_num_rows($rs)==0){
			return false;
		}else{
			return mysql_fetch_array($rs);
		}
	}
}  
?>