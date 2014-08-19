<?php
/**
 * Created by IntelliJ IDEA.
 * User: agnieszka
 * Date: 04/08/2014
 * Time: 07:47
 */

$cwd = getcwd();
$files = findFiles($cwd);
$file_list = array("stories: " => implode("\",\n \"", $files));
var_dump($file_list);


function findFiles($dir)
{
    $ffs = scandir($dir);
    $list = array();
    foreach ($ffs as $ff) {
        if ($ff != '.' && $ff != '..') {

            if (strpos($ff, '.php')) {
                $list[] = $dir . '/' . $ff;
            }
            if (is_dir($dir . '/' . $ff)) {
                $list = array_merge($list, findFiles($dir . '/' . $ff));
            }
        }
    }
    return $list;
}

?>