<?php
// metadata
$to = "to@to.com";
$from = "from@from.com";
$subject = "subject";
$message = "this is the message body";
$filename = "/home/user/file.jpeg";
$fname = "file.jpeg";

// headers
$headers = "From: $from"; 

// boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

// headers for attachment 
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

// multipart boundary 
$message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
$message .= "--{$mime_boundary}\n";

// preparing attachments            
$file = fopen($filename,"rb");
$data = fread($file,filesize($filename));
fclose($file);
$data = chunk_split(base64_encode($data));
$message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"".$fname."\"\n" . 
"Content-Disposition: attachment;\n" . " filename=\"$fname\"\n" . 
"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
$message .= "--{$mime_boundary}--\n";

// send
$ok = @mail($to, $subject, $message, $headers, "-f " . $from);
?>