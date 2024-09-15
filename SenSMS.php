<?php
    
    use Infobip\Configuration;
    use Infobip\Api\SmsApi;
    use Infobip\Model\SmsDestination;
    use Infobip\Model\SmsTextualMessage;
    use Infobip\Model\SmsAdvancedTextualRequest;

    require __DIR__ . "/vendor/autoload.php";
    
    if (!empty($_POST["Nph"]) && !empty($_POST["message"])){
        
        $number = $_POST["Nph"] ;
        $message = $_POST["message"] ;

        $base_url = "your_url";  //add the URL for your account in the infobiq you can find it in the part of developer 
        $api_key = "your_key"; // add you key 
        
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
        header("Location: indix.html");
      
    }else {

        $message="Please ensure all required information is provided";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>