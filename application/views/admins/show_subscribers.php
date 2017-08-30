<?php 
	foreach($all_emails as $member){
		echo $member['email'] . " " . $member['created_at'];
	}