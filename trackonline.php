<?php
require ('config.php');
if (!empty($_GET['email'])){
    $uniq_id = $_GET['uniq_id'];
    $checkid = "Id:" . $uniq_id;
    $email = $_GET['email'];
    $sub = $_GET['subject'];
    date_default_timezone_set('Asia/Kolkata');
    $updated_at = date('Y-m-d H:i:s');
    mysqli_query($con,"UPDATE `emails` SET `read_status` = '1',`updated_at` = '".$updated_at."' WHERE `uniq_id` = '".$uniq_id."'");
    $fh = fopen("email.txt", "a+"); //file handler
    $string = $email." opened the mail with subject: ".$sub." on %".$date."% with mailId: ".$uniq_id."\n";
    fwrite($fh, $string);
    fclose($fh);
    //All done, get out!
    exit;
}