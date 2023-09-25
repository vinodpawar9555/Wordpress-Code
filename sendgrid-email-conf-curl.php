define("SENDGRID_API_KEY","SG.xxxxxxxxxxxxxxxxxxxxxxxx");

//the 'to' parameter can be either be a single email as a string or an array of emails
function email($to,$subject,$message) {

    if (!$to) return;

    //start the params
    $params=[
        'from'=> "Email@address.com",
        'fromname'=> "From Name",
        'subject'=> $subject,
        'text'=> preg_replace("/\n\s+/","\n",rtrim(html_entity_decode(strip_tags($message)))),
        'html'=> $message,
    ];

    //if we have an array of email addresses, add a to[i] param for each
    if (is_array($to)) {
        $i=0;
        foreach($to as $t) $params['to['.$i++.']']=$t;

    //just one email, can add simply like this
    } else {
        $params['to']=$to;
    }

    // Generate curl request
    $session = curl_init('https://api.sendgrid.com/api/mail.send.json');
    // Tell PHP not to use SSLv3 (instead opting for TLS)
    curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
    curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.SENDGRID_API_KEY));
    // Tell curl to use HTTP POST
    curl_setopt ($session, CURLOPT_POST, true);
    // Tell curl that this is the body of the POST
    curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
    // Tell curl not to return headers, but do return the response
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

    //execute and obtain response
    $response = curl_exec($session);
    curl_close($session);

    //no response at all. that's bad!
    if (!$response) {
        $errorMessage="SENDGRID SENT NO RESPONSE<br>";
    } else {
        $response=json_decode($response,true);
        //wasn't a success
        if ($response['message']!='success') {
            $errorMessage="SENDGRID SENDING ERROR<br>Error(s): ".implode("<br>",$response['errors']);
        }
    }
    //finish forming error message and save to log
    if ($errorMessage) {
        $errorMessage.="Subject: ".$subject."<br>To: ";
        if (is_array($to)) {
            $errorMessage.=implode(",",$to);
        //just one email, can add simply like this
        } else {
            $errorMessage.=$to;
        }
        yourOwnLoggingFunction($errorMessage);
    }

    //show full response if needed
 // print_r($response); 

}

//send to one person
email("test@email.com","The Subject","<h1>The Body</h1><p>content here</p>");
//send to multiple people
email(["test1@email.com","test2@email.com"],"The Subject","<h1>The Body</h1><p>content here</p>");
