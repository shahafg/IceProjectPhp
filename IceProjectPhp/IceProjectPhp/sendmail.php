<!-- This page can be used to send emails to users -->
<html>
   <head>
      <title>Sending emails</title>
   </head>
   <body>

      <?php
         $to = "shahafgoren1@gmail.com";
         $subject = "Hello My Dear Friend";
         
         $message = "<b>How are you doing today? Let's meet up.</b>";
         $message .= "<h1>This is a test</h1>";
         
         $header = "From:shahafgoren1@gmail.com \r\n";
         $header .= "Cc:shahafgoren1@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
      
   </body>
</html>
