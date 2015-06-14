<?php
/*
 * Copyright (C) 2014 Rishvi Chakka <rishvi.s@gmail.com>
 *
 * Author: Rishvi Chakka <rishvi.s@gmail.com>
 */

//All the config params will go here
$twitter_api = Array(
   'api_url' => 'https://api.twitter.com/1.1/',
   'embed_url' => 'https://api.twitter.com/1/statuses/oembed.json',
   'version' => 1.1,
   'timeline' => Array(
        'uri' => 'statuses/user_timeline.json',
        'default_count' => 5,
    ),
   'friends' => Array(
        'uri' => 'friends/list.json',
        'default_count' => 5,
    ),
    'followers' => Array(
        'uri' =>  'followers/list.json',
        'default_count' => 5,
    ),                   
);
