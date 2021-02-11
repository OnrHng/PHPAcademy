<?php
// Magic constants
echo __DIR__.'<br>'; // gives path of current directory
echo __FILE__.'<br>'; // gives path of current file

echo __LINE__.'<br>'; // gives line number of this statement

// Create directory
//mkdir("test");

// Rename directory
//rename("test", "testNew");

// Delete directory
//rmdir('testNew');

// Read files and folders inside directory
$files = scandir('../');
print_r($files).'<br>';
echo '<br>';

// file_get_contents, file_put_contents
echo file_get_contents('lorem.txt').'<br>';

file_put_contents('sample.txt', 'Hello Onur was here!');
//file_put_contents('lorem.txt', 'Hello Onur was here!');

// file_get_contents from URL
$usersJson = file_get_contents('https://jsonplaceholder.typicode.com/users');
//print_r($usersJson);

// convert json to associate array
$users = json_decode($usersJson);
echo '<pre>';
print_r($users);
echo '<pre>';

// https://www.php.net/manual/en/book.filesystem.php


// file_exists
echo file_exists('lorem.txt'); // true
// is_dir
echo is_dir('test'); // return false cauz test isnot directory


// Check if file exists or not
file_exists('lorem.txt'); // true

// Get file size
filesize('lorem.txt');

// Delete file
unlink('lorem.txt');

// filemtime

// disk_free_space
