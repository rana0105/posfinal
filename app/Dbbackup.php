<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'spos');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('BACKUP_SAVE_TO', 'D:\dbbackup'); // without trailing slash
 
$time = time();
$day = date('j', $time);
if ($day == 1) {
    $date = date('Y-m-d', $time);
} else {
    $date = $day;
}
 
$backupFile = BACKUP_SAVE_TO . '/' . DB_NAME . '_' . $date . '.gz';
if (file_exists($backupFile)) {
    unlink($backupFile);
}
$command = 'mysqldump --opt -h ' . DB_HOST . ' -u ' . DB_USER . ' -p\'' . DB_PASSWORD . '\' ' . DB_NAME . ' | gzip > ' . $backupFile;
system($command);
 
?>