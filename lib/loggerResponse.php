<?php

if(isset($body)){

  file_put_contents($file,print_r($body, true). "\n", FILE_APPEND);
}
else {
  file_put_contents($file,print_r($t, true). "\n", FILE_APPEND);
}

file_put_contents($file,"------------------------------------------------------------------------\n", FILE_APPEND);
