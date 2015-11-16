<?php

                           Header("Cache-Control: must-revalidate");

                          $offset = 60 * 60 * 24 * 3;
                          $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
                          Header($ExpStr);

			 // spl = standard php library
				function my_autoloader($class) {
					include $class . '.php';
				}

				
				spl_autoload_register('my_autoloader');
				
				if(!isset($detect)) $temp = "";
				
				$detect = new detect();
				
				$os = $detect->get();
				
				if($detect->mobile($os) && $temp != "mobile" ){
						
						$temp = "mobile";
						header("location:mobile");
			//			echo "mobile";
				}

	/*			else if($detect->desktop($os) && $temp != "desktop")
				{
						$temp = "desktop";
						header("location:");
						
				//		echo "desktop";	
			}
*/

					// calls all the fucntions needed 
	include 'configDT.php';
	include 'users.php';
	include 'general.php';
	include 'admin.php';
	session_save_path("../sessions/");
	
				// checks if the user is logged in
	if(isset($_SESSION['login'])===true && $_SESSION['login']==1 )
	{
		if(isset($_SESSION['ID']) && isset($_SESSION['login_type']) == true && $_SESSION['login_type'] == '0')
		{
			$user_id = $_SESSION['ID'];				// store the id in the a variable , this enables the variable to called easily
													// this makes the function global and does not make any repeatitive coding
													
			$user_data = getUserData($user_id,'StudID','StudNum','username','password','FirstName','MiddleName','LastName','email','Address','BirthDate','FatherName','MotherName','Gender','Citizenship','CivilStatus','PlaceOfBirth','PermanentAddress','profilepic');	
		
			$user_course = getCourseName($user_id);
		}
		else if(isset($_SESSION['ID']) == false && isset($_SESSION['login_type']) == true && $_SESSION['login_type'] == '1')
		{
			
		}
		
		else
		{
			header('location:index.php');
		}
	}
	
	
?>