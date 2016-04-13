<?php
<<<CONFIG
packages:
    - "league/commonmark: ^0.13"
CONFIG;

use League\CommonMark\CommonMarkConverter;

$readmeMd = file_get_contents('README.md');

$converter = new CommonMarkConverter();
$html = $converter->convertToHtml($readmeMd);

file_put_contents('./README.html', $html, LOCK_EX);
