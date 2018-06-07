<?php
$str=uniqid();
echo $str." with type ".gettype($str)." and length ".strlen($str);