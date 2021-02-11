<?php

// Print current date
echo date('Y-m-d H:i:s').'<br>';

// Print yesterday
echo date('Y-m-d H:i:s', time() - 60 * 60 * 24).'<br>';
// Different format: https://www.php.net/manual/en/function.date.php

// Print current timestamp
echo time().'<br>';

// Parse date: https://www.php.net/manual/en/function.date-parse.php
$date =  date_parse('2020-10-21 09:00:00');
print_r($date);

// Parse date from format: https://www.php.net/manual/en/function.date-parse-from-format.php
