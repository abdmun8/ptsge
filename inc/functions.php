<?php
	/**
	 * Here its main functions
	 */
	session_start();
	class fm
	{
		var $con;
		function __construct()
		{
			$this->con = new mysqli("localhost","root","root","ptsge");
		}

		function login($usr)
		{
			$q = $this->con->query("SELECT * FROM user WHERE username='".$usr['username']."' AND password='".md5($usr['password'])."'");
			if($q->num_rows > 0){
				while ($row = $q->fetch_assoc()) {
					$_SESSION['userdata']['id'] = $row['id'];
					$_SESSION['userdata']['username'] = $row['username'];
					$_SESSION['userdata']['name'] = $row['name'];
				}
				return array('code'=>1);
			}else{
				return array('code'=>0);
			}

		}

		function alert($code)
		{
			switch ($code) {
				case '0':
					echo "<script>alert('Username/Password Salah!');</script>";
					break;
				case '1':
					echo "<script>alert('Login Berhasil!');location.reload();</script>";
					break;
			}
		}

		function get_data(){
			$query = "SELECT * FROM project";
			if(isset($_GET['filter'])){
				$query .= " WHERE ";
				if($_GET['pjno'] != '' && $_GET['pjno'] != 'ALL'){
					$query .= " pj_no like '%".$_GET['pjno']."%' ";
					$query .= " AND ";
				}

				if($_GET['from'] != ''){
					$query .= " date(timestamp) >= '".$_GET['from']."' ";
					$query .= " AND ";
				}

				if($_GET['to'] != ''){
					$query .= " date(timestamp) <= '".$_GET['to']."' ";	
					$query .= " AND ";
				}

				if($_GET['dept'] != ''){
					$query .= " dept like '%".$_GET['dept']."%' ";
				}
			}
			// echo $query;
			$q = $this->con->query($query);
			$data = NULL;
			if($q->num_rows > 0){
				while ($row = $q->fetch_assoc()) {
					$data[] = $row;
				}
			}
			return $data;
		}
	}
?>