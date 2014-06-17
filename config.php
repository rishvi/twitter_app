<?php
$twitter_api = Array(
   'api_url' => 'https://api.twitter.com/1.1/',
   'embed_url' => 'https://api.twitter.com/1/statuses/oembed.json',
   'version' => 1.1,
   'settings' => Array(
        'oauth_access_token' => "62794096-mEExGm9IggJEf4Wurr8JNvxvafPq0F6s5IlDY8CCv",
        'oauth_access_token_secret' => "ZZ4WI9HRbxcchfn32YehShGJBvdVQJJWBltbzn8bPxzs3",
        'consumer_key' => "YjOvQzzZO6dICa2FIZpTQPeVv",
        'consumer_secret' => "fsSnbXlzFVT4BoAYByge5DovF6uLHQccwLaRyFOiW37hbjRGYn"
    ),
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