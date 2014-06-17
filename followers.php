<?php
ini_set('display_errors', 1);
require_once 'config.php';
require_once 'lib/TwitterAPIExchange.php';
require_once 'utils.php';

$username = $_REQUEST['username'];
if ($username){

    $count = $twitter_api['followers']['default_count'];
    //set page details
    if(isset($_REQUEST['cursor']))
        $pagination['cursor'] = $_REQUEST['cursor'];
    else
        $pagination['cursor'] = -1;

    //get user and pagination details
    $response = get_followers($username, $count, $pagination);
?>
    <div style="background-color:#FFA500;" align='center' width='100%'>
    <h1 style="margin-bottom:0;"><?="People following '$username'"?></h1></div>
    <div id="content" style="background-color:#FFD700;float:left;width:100%">
<?php

    //display page details
    if(isset($pagination['previous']) && $pagination['previous'] != 0){
        $cursor = $pagination['previous'];
        print <<<HTML
        <font size='4' style='float:left'><b><i>
            <a href='followers.php?username=$username&cursor=$cursor'>
                Previous page
            </a>
        </i></b></font>
HTML;

    }
    if(isset($pagination['next']) && $pagination['next'] > 0){
        $cursor = $pagination['next'];
        print <<<HTML
        <font size='4' style='float:right'><b><i>
            <a href='followers.php?username=$username&cursor=$cursor'>
                Next page
            </a>
        </i></b></font>
HTML;

    }

    //display user/error details
    if(isset($response['error'])){
        echo "<font color='red' size='4'>{$response['message']}</font>";
    }
    else {    
        echo '<br /><ul style="list-style-type: none;">';
        foreach ($response as $key => $value) {
        print <<<HTML
        <li>
        <img src={$value['profile_image_url']} style='vertical-align:middle'/>
        &nbsp;&nbsp;
        <b>{$value['name']}</b> (screen name: {$value['screen_name']})
        </li><br />
HTML;
        }
    }
}
?>
    </ul>
    </div>
</body>
</html>