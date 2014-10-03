<?php

    sleep(3);
    
    if (empty($_POST['email'])) {
        $return['error'] = true;
        $return['msg'] = 'You did not enter your email.';
    }else{
    	//send email
        mail('lightworks@asu.edu', 'LightWorks Mailing List: New Entry' , 'Name:'.$_POST['name']."\n".'Email:'.$_POST['email']);
    
    	//return message
        $return['error'] = false;
        $return['msg'] = 'Thank you for signing for the ASU LightWorks Mailing List.';
    }
    
    echo json_encode($return);

?>