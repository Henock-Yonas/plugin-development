<?php 
/** 
 * plugin Name: Contact3248
 
 * Plugin URI:        https://example.com/plugins/Contact3248/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Henock Yonas
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       Contact3248-plugin*/
function Contact_form()
    {
        $content='';
        $content .= '<h2> Conact us!</h2> ';
        $content .= '<form method="post" action="http://localhost/contact/thank-you/">' ;

        $content .= '<label for="your_name">Name</label> ';
        $content .= '<input type="text" name="your_name" class="form-control" placeholder="enter your name"/>  ';

        $content .= '<label for="your_Email">Email</label> ';
        $content .= '<input type="Email" name="your_Email" class="form-control" placeholder="enter your Email"/>  ';
        
        $content .= '<label for="your_comment">Comment</label> ';
        $content .= '<textarea  name="your_comment" class="form-control" placeholder="enter your comment"> </textarea> ';

        $content .= '<br/><input type="Submit" name="Contact_form_submit" class="btn btn-md btn" value="send"/>  ';
        $content .= '</form>';
        return $content;
    }

    function Contact_form_capture ()
    {   if(isset($_POST['Contact_form_submit']))
        {
            $name= sanitize_text_field($_post['your_name']);
            $email= sanitize_text_field($_post['your_email']);
            $comments= sanitize_text_field($_post['your_comment']);

            $to = 'henockyeyoni@gmail.com';
            $subject = "test form submission";
            $message = ''.$name.' - '.$email . ' - '.$comments;
            wp_mail($to,$subject,$message);

        }

    }
add_action ('wp_head','Contact_form_capture');

add_shortcode('Contact_form','Contact_form');
?> 