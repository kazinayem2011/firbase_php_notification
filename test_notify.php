<?php
	$url = 'https://fcm.googleapis.com/fcm/send';

	/* $server_key available in:
    Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key */
	$server_key = "YOUR_SERVER_HERE";

	$device_id = "YOUR_DEVICE_ID_HERE";

    $fields = array (
        'registration_ids' => array (
        	$device_id
        ),
        'notification' => array (
            "body" => 'Your Message Body Here . . .',
            "title" => "Your Title",
            "icon" => "https://i.picsum.photos/id/7/200/200.jpg"
    	)
    );
    $fields = json_encode ( $fields );

    $headers = array (
            'Authorization: key=' . $server_key,
            'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
    echo $result;
    curl_close ( $ch );
?>