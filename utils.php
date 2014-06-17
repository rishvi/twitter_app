<?php
function perform_request($url, $getfield, $requestMethod){
    global $twitter_api;

    $settings = $twitter_api['settings'];

    $twitter = new TwitterAPIExchange($settings);
    $response= $twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest();

    return json_decode($response);
}

function get_followers($username, $count, &$pagination){
    global $twitter_api;

    $url = $twitter_api['api_url'].$twitter_api['followers']['uri'];
    $requestMethod = 'GET';
    $getfield = "?screen_name=$username&count=$count";

    //check if cursor is set and pass it in the params list
    if(isset($pagination['cursor']))
        $getfield .= "&cursor=".$pagination['cursor'];
    
    $response = perform_request($url, $getfield, $requestMethod);
    if(isset($response->errors))
        return array('error' => 1, 'message' => $response->errors[0]->message);

    //set pagination details
    $pagination['previous'] = $response->previous_cursor;
    $pagination['next'] = $response->next_cursor;
    
    //user details
    $i = 0;
    $result = array();
    $response = $response->users;    
    foreach ($response as $key => $value) {
        $result[$i]['profile_image_url'] = $value->profile_image_url;
        $result[$i]['name'] = $value->name;
        $result[$i]['screen_name'] = $value->screen_name;
        $i++;
    }

    return $result;
}

function get_friends($username, $count, &$pagination){
    global $twitter_api;

    $url = $twitter_api['api_url'].$twitter_api['friends']['uri'];
    $requestMethod = 'GET';
    $getfield = "?screen_name=$username&count=$count";

    //check if cursor is set and pass it in the params list
    if(isset($pagination['cursor']))
        $getfield .= "&cursor=".$pagination['cursor'];

    $response = perform_request($url, $getfield, $requestMethod);
    if(isset($response->errors))
        return array('error' => 1, 'message' => $response->errors[0]->message);

    //set pagination details
    $pagination['previous'] = $response->previous_cursor;
    $pagination['next'] = $response->next_cursor;
    
    //user details
    $i = 0;
    $result = array();
    $response = $response->users;    
    foreach ($response as $key => $value) {
        $result[$i]['profile_image_url'] = $value->profile_image_url;
        $result[$i]['name'] = $value->name;
        $result[$i]['screen_name'] = $value->screen_name;
        $i++;
    }

    return $result;
}

function get_user_timeline($username, $count, &$statuses_count){
    global $twitter_api;

    $url = $twitter_api['api_url'].$twitter_api['timeline']['uri'];
    $requestMethod = 'GET';
    $getfield = "?screen_name=$username&count=$count";
    
    $response = perform_request($url, $getfield, $requestMethod);
    if($response->errors)
        return array('error' => 1, 'message' => $response->errors[0]->message);
    
    //status details
    $i = 0;
    $result = array();
    $embed_url = $twitter_api['embed_url'];
    foreach ($response as $key => $value) {
        $getfield = "?id=".$value->id;
        $response = perform_request($embed_url, $getfield, $requestMethod);

        $result[] = $response->html;
        $statuses_count = $value->user->statuses_count;
    }

    return $result;
}