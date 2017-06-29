<?php


   $file = "log/log.txt";

   $logs['get']['name'] = 'get';
   $logs['get']['content'] = $_GET;

   $logs['post']['name'] = 'post';
   $logs['post']['content'] = $_POST;
   $logs['headers'] = apache_request_headers();
   $logs['uri'] = $_SERVER['REQUEST_URI'];

   file_put_contents($file,date("Y-m-d H:i:s"). "\n", FILE_APPEND);

   foreach ($logs as $log)
   {
     file_put_contents($file,print_r($log, true). "\n", FILE_APPEND);
   }

   file_put_contents($file,"----------------------------------\n", FILE_APPEND);
