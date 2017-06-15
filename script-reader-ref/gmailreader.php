
<?php


/* connect to gmail */
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'keerthigopalan93@gmail.com';
$password = 'rangaraj';
/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
/* grab emails */

$emails = imap_search($inbox,'FROM "keerthiga@agiratech.com"');
/* if emails are returned, cycle through each... */
if($emails) {        
        /* begin output var */
        $output = '';        
        /* put the newest emails on top */
        rsort($emails);        
        /* for every email... */
        foreach($emails as $email_number) {                
                /* get information specific to this email */
                $overview = imap_fetch_overview($inbox,$email_number,0);
                $message = imap_fetchbody($inbox,$email_number,1); 

                $mess = explode("---", $message);
                // print_r($mess);
                // $file = explode(" ", $mess[0]);
                // print_r($file);
                $odd = array();
                $even = array();
                foreach ($mess as $k => $v) {
                    if ($k % 2 == 0) {
                        $even[] = $v;
                    }
                    else {
                        $odd[] = $v;
                    }
                }
                print_r($even);
                die;
                          
                /* output the email header information */
                // $output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
                // $output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
                // $output.= '<span class="from">'.$overview[0]->from.'</span>';
                // $output.= '<span class="date">on '.$overview[0]->date.'</span>';
                // $output.= '</div>';
                
                /* output the email body */
                $output.= '<div class="body">'.$message.'</div>';
        }        
        echo $output;
}
imap_close($inbox);
?>