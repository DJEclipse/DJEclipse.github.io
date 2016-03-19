<?php

function get_client_ip() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else
        $ipaddress = 'UNKNOWN';

    if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];

    return $ipaddress;
}

$ipfile = fopen("ipfile.txt", "a");
$txt = get_client_ip() . "\n";
fwrite($ipfile, $txt);
fclose($ipfile);

?>


<!DOCTYPE>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Slap Countdown</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    
    <link rel="stylesheet" href="slap.css">

</head>
<body>

    <script>

        var sound = new Audio("beep.mp3");

        CountDownTimer('03/21/2016 12:30 PM');

        function CountDownTimer(dt)
        {
            var end = new Date(dt);

            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;




            function showRemaining() {
                var now = new Date();
                var distance = end - now;
                if (distance < 0) {

                    clearInterval(timer);
                    document.getElementById("days").innerHTML = 0;
                    document.getElementById("hours").innerHTML = 0;
                    document.getElementById("minutes").innerHTML = 0;
                    document.getElementById("seconds").innerHTML = 0;

                    return;
                }
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;
                sound.play();
            }

            timer = setInterval(showRemaining, 1000);
        }

    </script>
    
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

    <div id="main">

            <table align="center" style="">
                <tr>
                    <td><div id="days" class="time"></div></td>
                    <td><div id="hours" class="time"></div></td>
                    <td><div id="minutes" class="time"></div></td>
                    <td><div id="seconds" class="time"></div></td>
                </tr>
                <tr>
                    <td><p class="label">DAYS</p></td>
                    <td><p class="label">HOURS</p></td>
                    <td><p class="label">MINUTES</p></td>
                    <td><p class="label">SECONDS</p></td>
                </tr>
            </table>

    </div>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>