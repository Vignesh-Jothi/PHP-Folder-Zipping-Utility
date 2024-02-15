<?php

/* 
   ! Notes:
 
   - Ensure that the zip extension is enabled in your PHP configuration.
   - PHP version should be 5.2 or higher.
   - Set the $sourceFolder and $destinationZip variables to the appropriate paths.
   - Adjust the exclusion condition in the loop to omit specific folders or files from being zipped.

*/


function zipFolder($source, $destination) {
    if (!extension_loaded('zip') || !file_exists($source)) {
        echo '<br/>Failed: Either zip extension is not loaded or source folder does not exist.<br/>';
        return false;
    }

    $zip = new ZipArchive();
    $openResult = $zip->open($destination, ZipArchive::CREATE);
    if ($openResult !== true) {
        echo '<br/>Failed: Unable to open destination zip file. <br/>Error code: ' . $openResult;
        return false;
    }

    $source = realpath($source);

    if (is_dir($source) === true) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file) {
            $file = realpath($file);

            // * Exclude directories and files
            $filename = pathinfo($file, PATHINFO_FILENAME);
            // $extension = pathinfo($file, PATHINFO_EXTENSION);
            // ~ Change or add the Path's you have omit .
            if (in_array($filename, array('.', '..')) || strpos(str_replace('\\', '/', $file), '/Custom/Backup/dbbackup') !== false) {
                continue;
            }            

            if (is_dir($file) === true) {
                $zip->addEmptyDir(str_replace($source . DIRECTORY_SEPARATOR, '', $file . DIRECTORY_SEPARATOR));
            } elseif (is_file($file) === true) {
                $zip->addFile($file, str_replace($source . DIRECTORY_SEPARATOR, '', $file));
            }
        }
    } elseif (is_file($source) === true) {
        $zip->addFile($source, basename($source));
    }

    $closeResult = $zip->close();
    if (!$closeResult) {
        echo '<br/>Failed: Unable to close zip file.';
        return false;
    }

    return true;
}


// ~ Change the Source Path 

$sourceFolder = './';
$destinationZip = './archiveFull.zip';

if (zipFolder($sourceFolder, $destinationZip)) {
    echo 'Folder zipped successfully!';
} else {
    echo '<br/>Failed to zip folder.';
}
