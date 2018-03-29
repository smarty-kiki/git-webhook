<?php

$repository_name = $_GET['name'];
$repository_clone_url = $_GET['url'];

if (! $repository_name) {
    die('需要传 name 参数');
}

if (! $repository_clone_url) {
    die('需要传 url 参数');
}

$parent_dir = '/var/www';
$dir = $parent_dir.'/'.$repository_name;

if (! is_dir($dir)) {
    exec("cd $parent_dir; git clone $repository_clone_url");
}

exec("cd $dir; git pull origin master; git checkout -f master");
