<?php
$to = "h.yavitz@gmail.com";
$subject = "aliens attack";
$txt = "We are under attack from aliens!";
$headers = "From: potus@whitehouse.gov" . "\r\n" .
"CC: hunteryavitz@protonmail.com";
mail($to,$subject,$txt,$headers);
?> 