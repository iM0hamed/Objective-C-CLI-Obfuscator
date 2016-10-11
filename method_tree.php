<?php
error_reporting(0);
$mode=$argv[1];
$n = 1024;
if ($mode == 'code') {
	$prefix = randomPrefix();
	for ($i=1; $i < $n; $i++) {
		$i_1 = $i-1;
		echo "\n-(NSString*)".$prefix."_".$i."{return [self ".$prefix."_".$i_1."];}";
	}
} else if ($mode == 'list') {
	$prefix=$argv[2];
	for ($i=1; $i < $n; $i++) {
		$i_1 = $i-1;
		echo "\n".$prefix."_".$i;
	}
} else {
	die("\nValid options:\ncode - generates obj-c code\nlist PREFIX - generates list of methods\n");
}

function randomPrefix() {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 8; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
