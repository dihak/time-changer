<?php
$updated = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $time = $_POST['time'];
    $reset = $_POST['submit'] == 'reset';
    if ($reset) {
        echo "RESET";
        $output = shell_exec("timedatectl set-ntp 1");
    } else if ($time) {
        shell_exec("timedatectl set-ntp 0");
        $output = shell_exec("timedatectl set-time '$time'");
        $updated = true;
    }
}
$current = date('Y/m/d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Changer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
</head>
<body>
<?php
$updated = false;
?>
    <p>
    </p>
<?php
?>
    <p>
        <span>Current time : <?= $current; ?></span>
    </p>
    <form method="post">
        <input id="datetimepicker" placeholder="Please enter time" type="text" name="time" autocomplete="off">
        <p>
        <input type="submit" name="submit" value="submit">
        <input type="submit" name="submit" value="reset">
        </p>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script>
    jQuery('#datetimepicker').datetimepicker({
        format: 'Y-m-d H:i:s'
    });
    </script>
</body>
</html>