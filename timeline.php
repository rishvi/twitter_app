<!DOCTYPE html>
<html>
<body>
<head> 
    <meta charset="utf-8">  
    <script language="javascript" 
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">
    </script> 
    <script src="assets/twitter_widget.js" charset="utf-8"></script>
</head>
<?php
require_once 'config.php';
require_once 'lib/TwitterAPIExchange.php';
require_once 'utils.php';

$username = $_REQUEST['username'];
if ($username){
    $count = $twitter_api['friends']['default_count'];
    $response = get_user_timeline($username, $count, $statuses_count);
?>

    <div id="header" style="background-color:#FFA500;" align='center' width='100%'>
    <h1 style="margin-bottom:0;"><?="Latest tweets of '$username' "?></h1></div>
    <div id="content" style="background-color:#FFD700;float:left;width:100%">
    <ul style="list-style-type: none;">
    <font size='5'><b><i>
        <?=$username?>'s total lifetime tweets: <?=$statuses_count?>
    </i></b></font><br />
<?php    
    foreach ($response as $value) {
        echo "<li>";
        echo $value;
        echo "</li><br />";
    }
}
?>
</ul>
</div>
</body>
</html>