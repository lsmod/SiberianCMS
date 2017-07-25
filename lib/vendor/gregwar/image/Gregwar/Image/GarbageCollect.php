<?php

namespace Gregwar\Image;

/**
 * Garbage collect a directory, this will crawl a directory, lookng
<<<<<<< HEAD
 * for files older than X days and destroy them
=======
 * for files older than X days and destroy them.
>>>>>>> upstream/master
 *
 * @author Gregwar <g.passault@gmail.com>
 */
class GarbageCollect
{
    /**
<<<<<<< HEAD
     * Drops old files of a directory
     *
     * @param string $directory the name of the target directory
     * @param int $days the number of days to consider a file old
     * @param bool $verbose enable verbose output
=======
     * Drops old files of a directory.
     *
     * @param string $directory the name of the target directory
     * @param int    $days      the number of days to consider a file old
     * @param bool   $verbose   enable verbose output
>>>>>>> upstream/master
     *
     * @return true if all the files/directories of a directory was wiped
     */
    public static function dropOldFiles($directory, $days = 30, $verbose = false)
    {
        $allDropped = true;
        $now = time();

        $dir = opendir($directory);

        if (!$dir) {
            if ($verbose) {
                echo "! Unable to open $directory\n";
            }

            return false;
        }

        while ($file = readdir($dir)) {
            if ($file == '.' || $file == '..') {
                continue;
            }

            $fullName = $directory.'/'.$file;

<<<<<<< HEAD
            $old = $now-filemtime($fullName);
=======
            $old = $now - filemtime($fullName);
>>>>>>> upstream/master

            if (is_dir($fullName)) {
                // Directories are recursively crawled
                if (static::dropOldFiles($fullName, $days, $verbose)) {
                    self::drop($fullName, $verbose);
                } else {
                    $allDropped = false;
                }
            } else {
<<<<<<< HEAD
                if ($old > (24*60*60*$days)) {
=======
                if ($old > (24 * 60 * 60 * $days)) {
>>>>>>> upstream/master
                    self::drop($fullName, $verbose);
                } else {
                    $allDropped = false;
                }
            }
        }

        closedir($dir);

        return $allDropped;
    }

    /**
<<<<<<< HEAD
     * Drops a file or an empty directory
=======
     * Drops a file or an empty directory.
>>>>>>> upstream/master
     */
    public static function drop($file, $verbose = false)
    {
        if (is_dir($file)) {
            @rmdir($file);
        } else {
            @unlink($file);
        }

        if ($verbose) {
            echo "> Dropping $file...\n";
        }
    }
<<<<<<< HEAD

=======
>>>>>>> upstream/master
}
