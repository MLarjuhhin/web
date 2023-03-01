<?php

if(empty($modulePage1)) {
	$Query = $DB->AllRows("SELECT * FROM testimonial where date_delete is null ");
}elseif($modulePage1=='edit' && is_numeric($modulePage2)){
	$Update = $DB->FQuery("SELECT * FROM testimonial where id=?",[$modulePage2]);
	//TODO: refresh if empty


}elseif($modulePage1=='delete' && is_numeric($modulePage2)){
	dd('delete');
}


