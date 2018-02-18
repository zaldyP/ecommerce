<?php 



include_once '../lib/Database.php';

include_once '../helper/Format.php';




class Category
{
	
	private $db;
	private $fm;


	public function __construct()
	
	{
			$this->db = new Database();
			$this->fm = new Format();

	}


	public function catInsert($catName)
	
	{

		$catName = $this->fm->validation($catName);	

		$catName = mysqli_real_escape_string($this->db->link,$catName);


		if (empty($catName)) {
			
			$msg = '<span class="error">Category field must not be empty';
			return $msg;
		
		} else {

			$query = "INSERT INTO tbl_category (catname) VALUES('$catName')";

			$catinsert = $this->db->insert($query);

			if ($catinsert) {
				$msg = '<span class="success">Category Inserted Succesfully</span>';
				return $msg;
			}else {

				$msg = '<span class="error">Category Not Inserted </span>';
				return $msg;
				
			}

		}

	}





}

 ?>