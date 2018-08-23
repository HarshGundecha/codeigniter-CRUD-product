<?php
	if(isset($_REQUEST['lat']) && isset($_REQUEST['long']) )
	{
		/*
		https://maps.googleapis.com/maps/api/geocode/json?latlng=21.163735,72.792236&key=AIzaSyCvef7yvb-NZgIps374ivvouHLDnkduaX8
	
		$connection=mysqli_connect('localhost','root','','test');
		mysqli_query($connection,"insert into temp (temp) values ('hello')") or die("hello");
		*/
	
		$url='https://maps.googleapis.com/maps/api/geocode/json?latlng='.$_REQUEST['lat'].','.$_REQUEST['long'].'&key=AIzaSyCvef7yvb-NZgIps374ivvouHLDnkduaX8';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response_json = curl_exec($ch);
		curl_close($ch);
		$a=json_decode($response_json);
		//var_dump($a);
		//print_r($a);
		//echo json_decode($response_json['results']['formatted_address']);
		if(isset($a->error_message))
		{
			$address=null;
			$address=[];
			$address['error']=true;
			$address['message']=$a->error_message;
			echo json_encode($address);
		}
		else
		{
			$add=$a->results['0']->address_components;
			$addc=count($add);
			$address=null;
			$address=[];
			$address['error']=false;
			$address['data']['Address']=$a->results['0']->formatted_address;
			$address['data']['PostalCode']=$add[$addc-1]->long_name;
			$address['data']['City']=$add[$addc-4]->long_name;
			$address['data']['State']=$add[$addc-3]->long_name;
			$address['data']['Country']=$add[$addc-2]->long_name;
			echo json_encode($address);
		}
	}
?>