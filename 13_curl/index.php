<?php

$url = 'https://jsonplaceholder.typicode.com/users';
// Sample example to get data.

$resource = curl_init($url); // return a value of resource . Resource is a type in PHP.

// set_opt_array
curl_setopt($resource, CURLOPT_RETURNTRANSFER, true); // set option yapmadan resource okunamiyor.

$usersJSON = curl_exec($resource); // resource i execute ettigimde JSON return ediyor.
//echo $usersJSON;


// Get response status code
$responseCode = curl_getinfo($resource, CURLINFO_HTTP_CODE);
//echo $responseCode;

curl_close($resource); // after close the curl you can not any info from services

// ## Post request ## //
// create a user to send to jsonplaceholder api
$user = [
    'name' => 'John Doe',
    'username' => 'john',
    'email' => 'john@example.com'
];

$resource = curl_init();
curl_setopt_array($resource, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    CURLOPT_POSTFIELDS => json_encode($user)
]);

$result = curl_exec($resource);
curl_close($resource);
echo $result;


/*
 * What is the CURL??
 *
 * Curl is a tool which provides us more interactive remote services. eg. transfer data
 *
 * before I have seen file_get_content method but sometime from Security problem we are gonna
 * get an error. And also file_get_contents isnot useful sometime pass additional headers
 * some requests. OR  Post some info
 */