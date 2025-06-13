<?
setlocale(LC_ALL, 'ja_JP.UTF-8');

$data = file_get_contents("csv/meta.csv");


$data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');
$temp = tmpfile();
$meta = stream_get_meta_data($temp);
 
fwrite($temp, $data);
rewind($temp);
 
$file = new SplFileObject($meta['uri']);
$file->setFlags(SplFileObject::READ_CSV);
 
$csv  = array();
 
foreach($file as $line) {
    $csv[] = $line;
}

fclose($temp);
$file = null;
 
//print_r($csv);

$match = parse_url($_SERVER["REQUEST_URI"]);
$url = $match["path"];

foreach( $csv as $key => $value ) {
	if( $key == 0 || $key == "" ) continue;
	$csv1[ $value[0] ]["p"] = $value[1];
	$csv1[ $value[0] ]["title"] = $value[2];
	$csv1[ $value[0] ]["keyword"] = $value[3];
	$csv1[ $value[0] ]["description"] = $value[4];
}

//print_r($csv1);

if( array_key_exists($url,$csv1) ) {
	//print_r($csv1[$url]);
	$p           = $csv1[$url]["p"];
	$title       = $csv1[$url]["title"];
	$keyword     = $csv1[$url]["keyword"];
	$description = $csv1[$url]["description"];
}

if( $_GET["p"] == "meta" ) {
?>
<meta name="keywords" content="<?php echo $keyword;?>">
<meta name="description" content="<?php echo $description;?>">
<title><?php echo $title;?></title>
<?
} elseif( $_GET["p"] == "seo" ) {
?>
<?php echo $p;?>
<?
}