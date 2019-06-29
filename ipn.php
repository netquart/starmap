<?php


include_once 'dbconfig.php';





$q2= "INSERT INTO `user_payments` set set payment_status='verified'  ";	

					

					

	            $stmt = $db_con->prepare($q2);

			

			

			

					

				$stmt->execute();





?>