<?php
if(mail("johannes.muljana@ait.nsw.edu.au","A Subject Here","Hi there,\nThis email was sent using PHP's mail function."))
echo "Email successfully sent";
else{
print "An error occured";
}
?>