<?php
/*
 * Copyright (C) 2014 Rishvi Chakka <rishvi.s@gmail.com>
 *
 * Author: Rishvi Chakka <rishvi.s@gmail.com>
 */

ini_set('display_errors', 0);
?>

<html>
<frameset rows="10,90" noresize="noresize">
  <frame name="input" id="input" src="input.php" >
  <frameset cols="50, 50" noresize="noresize">
      <frame name="timeline" id="timeline" 
        src="timeline.php?username=<?=$_REQUEST['username']?>" >
      <frameset rows="50,50">
        <frame name="friends" id="friends" 
            src="friends.php?username=<?=$_REQUEST['username']?>" >
        <frame name="followers" id="followers" 
            src="followers.php?username=<?=$_REQUEST['username']?>" >
      </frameset>  
   </frameset>  
</frameset>
</html>
