<?php
session_start();
ini_set('display_errors', 1); 
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		
			extract($_POST);		
			$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".md5($password)."' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
				if($_SESSION['login_type'] == 1){
					return 1;
				}
				if($_SESSION['login_type'] == 3){
					return 3;
				}
				if($_SESSION['login_type'] == 4){
					return 4;
				}
				if($_SESSION['login_type'] == 5){
					return 5;
				}
				if($_SESSION['login_type'] == 6){
					return 6;
				}
				elseif ($_SESSION['login_type'] ==7) {
					return 7;
				}
				else{
					foreach ($_SESSION as $key => $value) {
						unset($_SESSION[$key]);
					}
					return 2 ;
					exit;
				}
			}else{
				return 0;
			}
	}
//check for payments
	function check_payment(){
		
			extract($_POST);
			$pro_id = $_SESSION['product_id'];	
			$qry = $this->db->query("SELECT * FROM payment where transaction_id = '".$transaction_id."' ");
			//check if there is payment by the submited id
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if(!is_numeric($key))
						$_SESSION['payment_'.$key] = $value;
				}
				if($_SESSION['payment_reason'] == "$reason" ){
				//check if the bidder is registered after payment process
				if ($_SESSION['payment_bidder_id'] == NULL  ) {
					$data = "pro_id = '$pro_id' ";
					$data .= ", bidder_id = '".$_SESSION['login_id']."' ";
					$save = $this->db->query("UPDATE payment set ".$data." where id = ".$_SESSION['payment_id']);
					if($save)
					return 1;
					}
					//check if registered and the right person is trying to bid 
				else if($_SESSION['payment_bidder_id'] != $_SESSION['login_id']){
					return 3;
					}

				else if($_SESSION['payment_bidder_id'] == $_SESSION['login_id']){
				//if the right person... 
					//check the right product
					if ($_SESSION['payment_pro_id'] == $pro_id) {
							//check status in process
					if($_SESSION['payment_status'] == 0){
						return 4;
					}
					//check status in active
					if($_SESSION['payment_status'] == 1){
						//check the amount 
						if($_SESSION['payment_amount'] < $_SESSION['pro_form_amount']){
						return 5;
						}
						//if amount true? success
						else{

							return 6;
						}
					}
					#payment status 1 end
					if($_SESSION['payment_status'] == 2){
						return 7;
					}
					}
					#product check end
					//if not the right product ..belongs to another product
					else
						return 8;
						}	
					
			}
			else{
				return 3;
			}
		}
//if No such transaction id found in the system...
			else{
				$status = 0;
		$data = " transaction_id = '$transaction_id' ";
		$data .= ", reason = '$reason' ";
		$data .= ", pro_id = '$pro_id' ";
		$data .= ", bidder_id = '".$_SESSION['login_id']."' ";
		$data .= ", status = '".$status."' ";
		$save = $this->db->query("INSERT INTO payment set ".$data);
		if($save)
				return 2;
			}
	}
	function Verify_comment_detail(){
		extract($_POST);
		$data = " status = 'read' ";
		$save = $this->db->query("UPDATE comment set ".$data." where id = ".$id);
		if($save){
			return 1;
		}
	}
	function Verify_sent_comment_detail(){
			return 1;
	}
	
	//check payment ends	
	function login2(){
		
			extract($_POST);		
			$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".md5($password)."' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
				//check whether the user accepted or not by technical commitee to login
				if ($_SESSION['login_status'] == 0 || $_SESSION['login_status'] == 1 ) 
				{
					# code...
				

					if($_SESSION['login_type'] == 1){
						return 1;
					}
					else if($_SESSION['login_type'] == 2){
						return 2;
					}
					else if($_SESSION['login_type'] == 3){
						return 3;
					}
					else if($_SESSION['login_type'] == 4){
						return 4;
					}
					else if($_SESSION['login_type'] == 5){
						return 5;
					}
					else if($_SESSION['login_type'] == 6){
						return 6;
					}
					
					else if($_SESSION['login_type'] == 7){
						return 7;
					}
					else{
						foreach ($_SESSION as $key => $value) {
							unset($_SESSION[$key]);
							}
						return 8 ;
						exit;
						}	
				}
				else{
					foreach ($_SESSION as $key => $value) {
							unset($_SESSION[$key]);
							}
					return 14;
					exit;
				}
			}
			else{
				foreach ($_SESSION as $key => $value) {
							unset($_SESSION[$key]);
							}
				return 9;
				exit;
			}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", lname = '$lname' ";
		$data .= ", age = '$age' ";
		$data .= ", username = '$username' ";
		if(!empty($password))
		$data .= ", password = '".md5($password)."' ";
		$data .= ", type = '$type' ";
		if($type == 1)
			$establishment_id = 0;
		$chk = $this->db->query("Select * from users where username = '$username' and id !='$id' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function save_comment(){
		extract($_POST);
		$sender_id = $_SESSION['login_id'];
		$sender_type = $_SESSION['login_type'];
		$data = " sender_id = '$sender_id' ";
		$data .= ", user_type = '$sender_type' ";
		$data .= ", reciver_id = '$resiver_id' ";
		$data .= ", title = '$Subject' ";
		$data .= ", detail = '$description' ";
		$data .= ", status = 'unread' ";
			$establishment_id = 0;		
			$save = $this->db->query("INSERT INTO comment set ".$data);
		if($save){
			return 1;
		}
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$id);
		if($delete)
			return 1;
	}
	function signup(){
		$ps_check = trim($_POST["password"]);
		$ps_check2 = trim($_POST["con-password"]);
		if($ps_check != $ps_check2){
			return 10;
			exit;
		}
		else if(strlen(trim($_POST["password"])) < 8){
			return 3;
			exit;
		}
		$type = 2;
		$status = 3;
		extract($_POST);
		$img_name = $_FILES['img']['name'];
		$input_img = $_FILES['img']['tmp_name'];
		$img_query = "photos/".$img_name;

		$data = " name = '$name' ";
		$data .= ", lname = '$lname' ";
		$data .= ", gender = '$gender' ";
		$data .= ", username = '$username' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", address = '$address' ";
		$data .= ", age = '$age' ";
		$data .= ", TIN_number = '$TIN' ";
		$data .= ", type = '$type' ";
		$data .= ", status = '$status' ";
		$data .= ", photo = '$img_query' ";
		move_uploaded_file($input_img, $img_query);
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * FROM users where username = '$username' ")->num_rows;
		$chk2 = $this->db->query("SELECT * FROM users where contact = '$contact' ")->num_rows;
		$chk3 = $this->db->query("SELECT * FROM users where TIN_number = '$TIN' ")->num_rows;
		
		if($chk > 0){
			return 0;
			exit;
		}
		if($chk2 > 0){
			return 1;
			exit;
		}
		if($chk3 > 0){
			return 2;
			exit;
		}
		
			$save = $this->db->query("INSERT INTO users set ".$data);
		if($save){
			$logout2 = $this->logout2();
				if($logout2)
				return $logout2;
		}
	}
	function update_account(){
		extract($_POST);
		$data = " name = '".$firstname.' '.$lastname."' ";
		$data .= ", username = '$email' ";
		if(!empty($password))
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' and id != '{$_SESSION['login_id']}' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("UPDATE users set $data where id = '{$_SESSION['login_id']}' ");
		if($save){
			$data = '';
			foreach($_POST as $k => $v){
				if($k =='password')
					continue;
				if(empty($data) && !is_numeric($k) )
					$data = " $k = '$v' ";
				else
					$data .= ", $k = '$v' ";
			}
			if($_FILES['img']['tmp_name'] != ''){
							$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
							$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
							$data .= ", avatar = '$fname' ";

			}
			$save_alumni = $this->db->query("UPDATE alumnus_bio set $data where id = '{$_SESSION['bio']['id']}' ");
			if($data){
				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);
				}
				$login = $this->login2();
				if($login)
				return 1;
			}
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '".str_replace("'","&#x2019;",$name)."' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['system'][$key] = $value;
		}

			return 1;
				}
	}

	
	function save_category(){
		extract($_POST);
		$data = " name = '$name' ";
			if(empty($id)){
				$save = $this->db->query("INSERT INTO categories set $data");
			}else{
				$save = $this->db->query("UPDATE categories set $data where id = $id");
			}
		if($save)
			return 1;
	}
	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM categories where id = ".$id);
		if($delete){
			return 1;
		}
	}
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
	}
	function delete_product(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM products where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function get_latest_bid(){
		extract($_POST);
		$get = $this->db->query("SELECT * FROM bids where product_id = $product_id order by bid_amount desc limit 1 ");
		$bid = $get->num_rows > 0 ? $get->fetch_array()['bid_amount'] : 0 ;
		return $bid;
	}
	function save_bid(){ 
		extract($_POST);
		$data = "";
		$chk = $this->db->query("SELECT * FROM bids where product_id = $product_id order by bid_amount desc limit 1 ");
		$uid = $chk->num_rows > 0 ? $chk->fetch_array()['user_id'] : 0 ;
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
					$data .= ", user_id='{$_SESSION['login_id']}' ";

		if($uid == $_SESSION['login_id']){
			return 2;
			exit;
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO bids set ".$data);
		}else{
			$save = $this->db->query("UPDATE bids set ".$data." where id=".$id);
		}
		if($save){
			$save2 = $this->db->query("UPDATE payment set status = 2 where id=".$_SESSION['payment_id']);
			if($save2){
			return 1;
			exit;	
			}
			else
			{
			return 0;
			exit;	
			}
			
		}
	}
	function delete_book(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM books where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function get_booked_details(){
		extract($_POST);
		$qry = $this->db->query("SELECT b.*,c.brand, c.model FROM books b inner join cars c on c.id = b.car_id where b.id = $id ")->fetch_array();
		$data = array();
		foreach($qry as $k=>$v){
			if(!is_numeric($k))
			$data[$k]= $v;
		}
			return json_encode($data);
	}
	function save_movement(){
		extract($_POST);
		$data = " booked_id = '$book_id' ";
		$data .= ", car_id = '$car_id' ";

		if(empty($id)){
			$save = $this->db->query("INSERT INTO borrowed_cars set ".$data);
			if($save){
				$data = " car_registration_no = '$car_registration_no' ";
				$data .= ", car_plate_no = '$car_plate_no' ";
				$this->db->query("UPDATE books set $data where id = $book_id");
			}
		}else{
		$data .= ", status = '$status' ";
			$save = $this->db->query("UPDATE borrowed_cars set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_movement(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM borrowed_cars where id = ".$id);
		if($delete){
			return 1;
		}
	}
	function save_event(){
		extract($_POST);
		$data = " title = '$title' ";
		$data .= ", schedule = '$schedule' ";
		$data .= ", content = '".htmlentities(str_replace("'","&#x2019;",$content))."' ";
		if($_FILES['banner']['tmp_name'] != ''){
						$_FILES['banner']['name'] = str_replace(array("(",")"," "), '', $_FILES['banner']['name']);
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['banner']['name'];
						$move = move_uploaded_file($_FILES['banner']['tmp_name'],'assets/uploads/'. $fname);
					$data .= ", banner = '$fname' ";

		}
		if(empty($id)){

			$save = $this->db->query("INSERT INTO events set ".$data);
		}else{
			$save = $this->db->query("UPDATE events set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_event(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM events where id = ".$id);
		if($delete){
			return 1;
		}
	}
	
	function participate(){
		extract($_POST);
		$data = " event_id = '$event_id' ";
		$data .= ", user_id = '{$_SESSION['login_id']}' ";
		$commit = $this->db->query("INSERT INTO event_commits set $data ");
		if($commit)
			return 1;

	}
}