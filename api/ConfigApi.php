<?php

class ConfigApi {

  public static $RESOURCE = 'resource';
  public static $PARAMS = 'params';
  public static $RESOURCES = [
    
    'commentary#GET' => 'CommentaryApiController#getCommentarys',
    'commentary#DELETE' => 'CommentaryApiController#deleteCommentary',
    'commentary#POST' => 'CommentaryApiController#createCommentary',
    'commentary#PUT' => 'CommentaryApiController#editCommentary',
  ];
}

?>
