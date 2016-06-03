<?php

$adminElements = array_map('str_getcsv', file(__DIR__.'/../package/app/locale/sl_SI/Mage_Adminhtml.csv'));

$admin = [];

foreach ($adminElements as $el) {
    $admin[] = $el[0];
}

$csv = array_map('str_getcsv', file(__DIR__.'/../package/app/design/adminhtml/default/default/locale/sl_SI/translate.csv'));

$i = 1;
foreach($csv as $translate) {
    if (!in_array($translate[0], $admin)) {
        echo $i.'. '.$translate[0]."\n";
    }
    $i++;
}
