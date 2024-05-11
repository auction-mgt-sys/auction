function save_product(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','img')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
			}
		
		if(empty($id)){
			$save = $this->db->query("INSERT INTO products set $data");
			$id = $this->db->insert_id;
		}else{
			$save = $this->db->query("UPDATE products set $data where id = $id");
		}

		if($save){

			if($_FILES['img']['tmp_name'] != ''){
			$ftype= explode('.',$_FILES['img']['name']);
			$ftype= end($ftype);
			$fname =$id.'.'.$ftype;
			if(is_file('assets/uploads/'. $fname))
				unlink('assets/uploads/'. $fname);
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
			$save = $this->db->query("UPDATE products set img_fname='$fname' where id = $id");
			}
			return 1;
		}