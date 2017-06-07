<?php
function rand_64($length){
  return substr(base64_encode(bcrypt(mt_rand())), 9, $length);
}
