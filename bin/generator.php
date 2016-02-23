<?php

try {
    $rootPath = realpath(__DIR__ . '/../sl_SI');
    $package = new PharData('sl_SI.tar');

    // Create recursive directory iterator
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        if (!$file->isDir()) {
            // Get real path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);

            // Add current file to .tar archive
            $package->addFile($filePath, $relativePath);
        }
    }

    // Compress .tar file to .tgz
    $package->compress(Phar::GZ, '.tgz');

    // Both files (.tar and .tgz) exists. This removes temporary .tar file
    unlink('sl_SI.tar');
} catch (Exception $e) {
    echo "Exception : " . $e;
}
