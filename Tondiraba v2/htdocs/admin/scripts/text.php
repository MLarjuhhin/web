<?php
$languages = $DB->AllRows("SELECT * FROM texts");
$submit_form = 'add';

if ($modulePage1 == 'edit' && is_numeric($modulePage2)) {
	$language = $DB->FQuery("SELECT * FROM texts where id=?", [$modulePage2]);
	$submit_form = 'edit';
}

if (isset($_POST['act'])) {
	if ($_POST['act'] == 'add_language' || $_POST['act'] == 'edit_language') {
		if (empty($data['error'])) {
			if ($submit_form == 'add') {
				$insert = [
					'rus' => $_POST['text_rus'],
					'slug' => $_POST['slug'],
				];
			} else {
				$insert = [
					'rus' => $_POST['text_rus'],
				];
			}
			if ($submit_form == 'add') {
				$res = $DB->Insert('texts', $insert);
				if ($res) {
					$id = $DB->getInsertID();
					$_SESSION['success'] = 'ok<br>'.$id;
				} else {
					$_SESSION['error'] = 'error#1';
				}
			} else {
				$res = $DB->Update('texts', $insert, 'where id='.$modulePage2);
				if (!$res) {
					$_SESSION['error'] = 'error#2';
				} else {
					$_SESSION['success'] = 'ok';
				}

			}
			generate_language_file();
			refreshPage('/text');
		}
	} elseif ($_POST['act'] == 'search') {
		$where = 'where 1';
//		if (!empty($_POST['text_search_id']) && is_numeric($_POST['text_search_id'])) {
//			$where .= ' and id='.$_POST['text_search_id'];
//		}
		if (!empty($_POST['text_search_rus'])) {
			$where .= " and rus LIKE '%".$_POST['text_search_rus']."%'";
		}
		if (!empty($_POST['text_search_slug'])) {
			$where .= " and slug LIKE '%".$_POST['text_search_slug']."%'";
		}

		if (!empty($where)) {
			$languages = $DB->AllRows("SELECT * FROM texts  ".$where);
		}
	}
}