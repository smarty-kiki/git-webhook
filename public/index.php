<?php

$git_url = $_GET['repo'];
$dir_name = str_replace(['https://github.com/smarty-kiki/', '.git'], '', $git_url);

$parent_dir = '/var/www';
$dir = $parent_dir.'/'.$dir_name;

if (is_dir($dir)) {
    exec("cd $dir; git pull origin master; git checkout -f master");
} else {
    exec("cd $parent_dir; git clone $git_url; cd $dir; git checkout -f master");
}
