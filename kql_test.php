<?php
/*
 * temporary PHP script for test.
 * This script will be removed when it is merged.
 */

require __DIR__.'/app/check_setup.php';
require __DIR__.'/app/common.php';
#require_once __DIR__.'/app/Libs/KQLParser.php';

use Libs\KQLParser;

$kql = 'NOT abc ( status:open OR status:closed ) OR x';
$parser = new KQLParser($kql);
printf("# Parsing the following query\nKQL: %s\n", $kql);
print_r($parser->match_expr());

$kql = 'project:"My project" assignee:me color:Yellow';
$parser = new KQLParser($kql);
printf("# Parsing the following query\nKQL: %s\n", $kql);
print_r($parser->match_expr());

$kql = '"My task" after:2014/10/04';
$parser = new KQLParser($kql);
printf("# Parsing the following query\nKQL: %s\n", $kql);
print_r($parser->match_expr());

$kql = '"My task" due:over';
$parser = new KQLParser($kql);
printf("# Parsing the following query\nKQL: %s\n", $kql);
print_r($parser->match_expr());

?>
