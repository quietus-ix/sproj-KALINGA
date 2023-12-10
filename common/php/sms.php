<?php
     use Infobip\Configuration;

     $configuration = new Configuration(
          host: 'n8xy3y.api.infobip.com',
          apiKey: '2a4fa4b0e08f7c6cbedf5fc288774f11-1b584310-6fe3-4705-aa0b-f2134ee5e704'
     );

     // to send SMS
     // use Infobip\ApiException;
     // use Infobip\Model\SmsAdvancedTextualRequest;
     // use Infobip\Model\SmsDestination;
     // use Infobip\Model\SmsTextualMessage;

     // $sendSmsApi = new SmsApi(config: $configuration);

     // $message = new SmsTextualMessage(
     //      destinations: [
     //           new SmsDestination(to: '41793026727')
     //      ],
     //      from: 'InfoSMS',
     //      text: 'This is a dummy SMS message sent using infobip-api-php-client'
     // );

     // $request = new SmsAdvancedTextualRequest(messages: [$message]);

     // try {
     //      $smsResponse = $sendSmsApi->sendSmsMessage($request);
     // } catch (ApiException $apiException) {
          
     // }
?>