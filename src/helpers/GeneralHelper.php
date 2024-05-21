<?php

if (!function_exists('nice_print')) {
   function nice_print($string, $next_char_printing_speed = 1, $waiting_time_before_proceeding = 1, $ending_line_breaks = 1) {
      $pieces = explode(" ", $string);

      $speed = 10000 / $next_char_printing_speed;
      $wait_time = 10000 * $waiting_time_before_proceeding;

      for ($i=0 ; $i < count($pieces) ; $i++) {
         echo $pieces[$i] . " ";
         usleep($speed);
      }
      for ($i=0 ; $i < $ending_line_breaks; $i++) {
         echo "\n";
      }
      usleep($wait_time);
   }
}