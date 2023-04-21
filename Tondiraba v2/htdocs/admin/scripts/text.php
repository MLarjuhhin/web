<?php
$languages = $DB->AllRows("SELECT * FROM texts");
$submit_form = 'add';

if ($modulePage1 == 'edit' && is_numeric($modulePage2)) {
	$language=$DB->FQuery("SELECT * FROM texts where id=?",[$modulePage2]);
	$submit_form = 'edit';
}

if (isset($_POST['act'])) {
	if ($_POST['act'] == 'add_language' || $_POST['act'] == 'edit_language') {
		if (empty($data['error'])) {
			$insert = [
				'rus' => $_POST['text_rus'],
				'slug'=>$_POST['slug'],
			];
			if ($submit_form == 'add') {
				$res = $DB->Insert('texts', $insert);
				if ($res) {
					$id = $DB->getInsertID();
					$_SESSION['success']='ok<br>'.$id;
				} else {
					$_SESSION['error'] = 'error#1';
				}
			} else {
				$res = $DB->Update('texts', $insert, 'where id='.$modulePage2);
				if (!$res) {
					$_SESSION['error'] = 'error#2';
				} else {
					$_SESSION['success']='ok';
				}
			}
			refreshPage('/text');
		}
	}
}