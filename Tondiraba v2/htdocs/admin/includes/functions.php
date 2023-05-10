<?php
function print_rf($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function dd($data)
{
	print_rf($data);
	exit();
}

function refreshPage($url = false)
{
	if (!$url) {
		$url = $_SERVER['REQUEST_URI'];
	}
	header("Location: ".$url);
	exit;
}

function showArray($d)
{
	if (is_array($d)) {
		foreach ($d as $k => $v) {
			showArray($v);
		}
	} else {
		print $d."<br />";
	}
}

function text($slug)
{
	global $ALL_TEXT, $conf;

	$slug = trim($slug);

	if (isset($_SESSION['keel']) && in_array($_SESSION['keel'], $conf['language'])) {
		$lang = $_SESSION['keel'];
	} else {
		$lang = $conf['default_language'];
	}
	$out = $ALL_TEXT[$lang][$slug];

	return (empty($out))?$slug:$out;


}

function generate_language_file()
{

	global $DB, $conf;

	$all_text = $DB->AllRows("SELECT * FROM texts");

	$text = [];

	foreach ($all_text as $k => $v) {
		foreach ($conf['language'] as $lang) {
			//если нет СЛАГ, тогда не сохраняем перевод в файл
			if(empty($v['slug']))continue;
			$text[$lang][$v['slug']] = $v[$lang];
		}
	}
	foreach ($text as $lang => $t) {
		file_put_contents($conf['language_dir']."/".$lang.".json", json_encode($t));
	}
	return $all_text;
}

function load_languages()
{

	global $conf;

	$texts = [];

	foreach ($conf['language'] as $lang) {
		if (is_file($conf['language_dir']."/".$lang.".json")) {
			$texts[$lang] = json_decode(file_get_contents($conf['language_dir']."/".$lang.".json"), true);
		}
	}

	return $texts;

}