<?php

$info = json_decode(file_get_contents('php://input'), true);
$repository_name = $info['repository']['name'];
$repository_clone_url = $info['repository']['clone_url'];

$parent_dir = '/var/www';
$dir = $parent_dir.'/'.$repository_name;

if (! is_dir($dir)) {
    exec("cd $parent_dir; git clone $repository_clone_url");
}

exec("cd $dir; git pull origin master; git checkout -f master");
