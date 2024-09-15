<?php
    
    use Infobip\Configuration;
    use Infobip\Api\SmsApi;
    use Infobip\Model\SmsDestination;
    use Infobip\Model\SmsTextualMessage;
    use Infobip\Model\SmsAdvancedTextualRequest;
    use Twilio\Rest\Client;

    require __DIR__ . "/vendor/autoload.php";
    
    if (!empty($_POST["Nph"]) && !empty($_POST["message"])){
        
        $destination = $_POST["Nph"] ;
        $message = $_POST["message"] ;

        $base_url = "y3ddmg.api.infobip.com";  //add the URL for your account in the infobiq you can find it in the part of developer 
        $api_key = "y3ddmg.api.infobip.com"; // add you key 
        
        $configuration = new Configuration(host: $base_url, apiKey: $api_key);
        $api = new SmsApi(config: $configuration);
        $destination = new SmsDestination(to: $number);

        $message = new SmsTextualMessage(
            destinations: [$destination],
            text: $message,
            from: "daveh"
        );

        $request = new SmsAdvancedTextualRequest(messages: [$message]);
        $response = $api->sendSmsMessage($request);

        $message="The SMS has been sent successfully.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else {

        $message="Please ensure all required information is provided";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>