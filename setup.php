<?php

// defining utility functions
function removeDirectoryRecursively($dir) {
    if(is_dir($dir)) {
        $objects = scandir($dir);
        foreach($objects as $object) { 
            if ($object != "." && $object != "..") { 
                if(is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . "/" . $object)) {
                    removeDirectoryRecursively($dir . DIRECTORY_SEPARATOR . $object);
                } else {
                    unlink($dir . DIRECTORY_SEPARATOR . $object);
                }
            }
        }
        rmdir($dir); 
    }
}


// removing .git
removeDirectoryRecursively(".git");

// rmoving .circleci
removeDirectoryRecursively(".circleci");