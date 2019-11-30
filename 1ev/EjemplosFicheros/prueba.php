<?php
$lines = file($filename, FILE_IGNORE_NEW_LINES);

$file_handle = fopen($filename, 'wb');

fwrite($file_handle, "\xEF\xBB\xBF");

foreach($lines as $key =&gt; $value)
{
    fwrite($file_handle, $value . PHP_EOL);
}

fclose($file_handle);
?>