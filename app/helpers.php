<?php
use KhmerDateTime\KhmerDateTime;

if(!function_exists('nowKhmerDate')){
  function nowKhmerDate(){
    return KhmerDateTime::parse(now())->format("LL");    
  }
}

if(!function_exists('toKhmerDate')){
  function toKhmerDate($date){
    return KhmerDateTime::parse($date)->format("LL");
  }
}