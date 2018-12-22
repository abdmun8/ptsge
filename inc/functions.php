<?php
	/**
	 * Here its main functions
	 */
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
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['name'] = $row['name'];
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
					echo "<script>alert('Username/Password Salah!')</script>";
					break;
				case '1':
					echo "<script>alert('Login Berhasil!')</script>";
					break;
				case '2':
					session_destroy();
					echo "<script>alert('Logout Berhasil!');
					window.open('..','_self')</script>";
					break;
			}
		}

		function get_data(){
			$q = $this->con->query("SELECT * FROM project");
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