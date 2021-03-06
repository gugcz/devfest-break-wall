<?php require_once("config/config.php");
if (isset($_GET['sessionID']))
    $id = $_GET['sessionID'];
else
    header("Location: /");

$result = dibi::query("SELECT name, image, time FROM sessions WHERE id = %i", $id);
$r = $result->fetchAll();
$r = $r[0];
$name = $r['name'];
$time = $r['time'];
$image = $r['image'] == "" ? "GDGarrow.jpg":$r['image'];

if (isset($_GET['time']))
    $time = $_GET['time'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DevFest Praha 2013">
    <meta name="author" content="Jirka Korejtko">

    <title>DevFest Praha 2013</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/devfest-style.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            padding-top: 0px;
            font-size: 24px;
        }

        .next {
            margin: 20px 0 0 0;
            display: block;
            text-align: center;
            font-weight: bold;
            font-size: 50px;
        }

        .session {
            margin: 0;
            display: block;
            text-align: center;
            font-weight: bold;
            color: #0080c5;
            font-size: 70px;
            overflow: hidden;
            height: 200px;
        }
    </style>
</head>

<body>
<div class="totalcenter">
    <div class="container">
        <img src="images/footer.png" class="img-responsive" style="margin: auto;">

        <span class="next">Následuje</span>

        <div style="height: 20px"></div>
        <span class="session"><?php echo $name; ?></span>

        <div style="height: 68px"></div>
        <div class="row countdown" id="countdown">
            <div class="col-md-4 text-center">
                <img src="images/speakers/<?php echo $image; ?>">
            </div>
            <div class="col-md-4 counter">
                <ul class="menu menu-h">
                    <li style="margin: 0 auto">
                        <span id="minutes"></span> Minut
                    </li>
                </ul>
            </div>
            <div class="col-md-4 counter">
                <ul class="menu menu-h">
                    <li style="margin: 0 auto">
                        <span id="seconds"></span> Vteřin
                    </li>
                </ul>
            </div>
            <div class="col-md-8 aftercounter" style="display: none; margin-bottom: 21px;">
                <span style="font-size: 120px; font-weight: bold; text-align: center;">Za chvíli<br>to začne!</span>
                </div>
        </div>
        <div style="height: 93px"></div>

        <img src="images/footer.png" class="img-responsive" style="margin: auto;">
    </div>
</div>
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript'>
    $(document).ready(function () {
        /* Countdown */
        if ($('#countdown').size() > 0) {
            $('#countdown').countdown(new Date("<?php echo $conference_date . ' ' . $time; ?>:00"), function (event) {
                var $this = $(this);
                switch (event.type) {
                    case "seconds":
                    case "minutes":
                    case "hours":
                    case "days":
                        $this.find('span#' + event.type).html(event.value);
                        break;
                    case "finished":
                        $this.find('div.counter').hide();
                        $this.find('div.aftercounter').show();
                        break;
                }
            });
        }
    });
</script>
</body>
</html>