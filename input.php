<?php
/*
 * Copyright (C) 2014 Rishvi Chakka <rishvi.s@gmail.com>
 *
 * Author: Rishvi Chakka <rishvi.s@gmail.com>
 */
?>
<!DOCTYPE html>
<html>
<body>
<head> 
    <meta charset="utf-8">  
    <script language="javascript" 
        src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">
    </script>
</head>
<br />
<body style='background-color:#47B28F;'>
<div align='center'>
<form name='input_form'>
    <label><b>
        Enter the username for which the records are to be retrieved: 
    </b></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type='text' name='username' id='username' 
        value='<?=$_REQUEST['username']?>' />
    <input type='submit' name='submit' value='submit' />
</form>
</div>
</body>

<script type='text/javascript'>
    $("input_form").submit(function() {
        var username = $("#username").val();
        if(!username) return false;

        parent.timeline.location.href = 'timeline.php?username='+username;
        parent.followers.location.href = 'followers.php?username='+username;
        parent.friends.location.href = 'friends.php?username='+username;
    }
</script>
