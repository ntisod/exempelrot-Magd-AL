<?php
$t = date("H");

if ($t < "10") {
  echo "God Morgon!";
} elseif ($t < "13") {
  echo "God förmiddag!";
} elseif ($t < "15"){
  echo "God dag!";
} elseif ($t < "18") {
  echo "God eftermiddag!";
} elseif ($t < "20"){
  echo "God kväll!";
} elseif ($t < "24") {
  echo "God natt!";
}
?>
