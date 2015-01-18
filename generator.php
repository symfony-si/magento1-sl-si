<?php

// Get real path for our folder
$rootPath = realpath('sl_SI');

// Initialize archive object
$zip = new ZipArchive;
$zip->open('sl_SI.zip', ZipArchive::CREATE);

// Initialize empty "delete list"
$filesToDelete = array();

// Create recursive directory iterator
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
    // Get real path for current file
    $filePath = $file->getRealPath();

    // Add current file to archive
    $zip->addFile($filePath);

    // Add current file to "delete list" (if need)
    if ($file->getFilename() != 'important.txt') {
        $filesToDelete[] = $filePath;
    }
}

// Zip archive will be created only after closing object
$zip->close();

// Delete all files from "delete list"
foreach ($filesToDelete as $file) {
    unlink($file);
}