<?php
session_start();
include_once 'Session_Config_nonlogin.php';
//empty cart by distroying current session
if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
	$return_url = base64_decode($_GET["return_url"]); //return url
	unset($_SESSION["products"]);
	unset($_SESSION['options']);
	header('Location:'.$return_url);
}

//add item in shopping cart
if(isset($_POST["type"]) && $_POST["type"]=='add' && isset($_POST["component"]) && $_POST["component"] = 'CT')
{
	$CT_Name 	= filter_var($_POST["product_content"], FILTER_SANITIZE_STRING); //product code

	$detail 	= filter_var($_POST["product_detail"], FILTER_SANITIZE_STRING); //product code

	$return_url 	= base64_decode($_POST["return_url"]); //return url



		//prepare array for the session variable 
		$event = explode("---", $detail);

		$new_CycleTime = array(array('name'=>$CT_Name, 'startevent'=>$event[0], 'endevent'=>$event[1]));
		
		if(isset($_SESSION["products"])) //if we have the session
		{
			$found = false; //set found item to false
			
			foreach ($_SESSION["products"] as $process_map) //loop through session array
			{
				if($process_map["name"] == $CT_Name){ //the item exist in array
					// echo "nothing";
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('name'=>$process_map["name"], 'startevent'=>$process_map["startevent"], 'endevent'=>$process_map["endevent"]);
				}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["products"] = array_merge($product, $new_CycleTime);
			}else{

			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["products"] = $new_CycleTime;
		}
	//redirect back to original page
	header('Location:'.$return_url);
}

//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["products"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	$return_url 	= base64_decode($_GET["return_url"]); //get return url

	
	foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
	{
		if($cart_itm["name"]!=$product_code){ //item does,t exist in the list
			$product[] = array('name'=>$cart_itm["name"], 'startevent'=>$cart_itm["startevent"], 'endevent'=>$cart_itm["endevent"]);
		}
		
		//create a new product list for cart
		$_SESSION["products"] = $product;
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}
?>