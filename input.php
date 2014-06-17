<br />
<body style='background-color:#47B28F;'>
<div align='center'>
<form name='input_form'>
    <label><b>
        Enter the username for which the records are to be retrieved: 
    </b></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type='text' name='username' id='username' 
        value='<?=$_REQUEST['username']?>'>
    <input type='submit' name='submit' value='submit' 
        onClick='javascript:on_submit();'>
</form>
</div>
</body>

<script type='text/javascript'>
    function on_submit(){
        var username = document.getElementById('username').value;
        if(!username){
            return false; 
        }
        parent.timeline.location.href = 'timeline.php?username='+username;
        parent.followers.location.href = 'followers.php?username='+username;
        parent.friends.location.href = 'friends.php?username='+username;
    }
</script>
