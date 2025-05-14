<?php

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;
use Twilio\Rest\Client;

require  '\autoload.php';

$number = $_POST["number"];
$message = $_POST["message"];

if ($_POST["provider"] === "infobip") {

    $base_url = "INFOBIP_BASE_URL";
    $api_key = "YOUR_API_KEY";

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

} else {   // Twilio

    $account_id = "YOUR_INFOBIP_ACCOUNT_ID";
    $auth_token = "YOUR AUTH TOKEN";

    $client = new Client($account_id, $auth_token);

    $twilio_number = "+YOUR_TWILIO_NUMBER";

    $client->messages->create(
        $number,
        [
            "from" => $twilio_number,
            "body" => $message
        ]
    );

}

echo "Message sent.";