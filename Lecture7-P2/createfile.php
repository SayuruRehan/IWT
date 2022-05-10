<?php
  $file = fopen("test.txt","r");
  $file = fopen("/home/test/test.txt","r");
  $file = fopen("http://www.example.com/","r");
  $file = fopen("ftp://user:password@example.com/test.txt","w");
?>