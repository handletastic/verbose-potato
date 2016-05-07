<?php
if(mail("your.email@domain.com","A Subject Here","Hi there,\nThis email was sent using PHP's mail function."))
echo "Email successfully sent";
else{
print "An error occured";
}
?>