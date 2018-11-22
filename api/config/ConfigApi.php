<?php

class ConfigApi {

  public static $RESOURCE = 'resource';
  public static $PARAMS = 'params';
  public static $RESOURCES = [

    'comment#GET' => 'CommentaryApi#getCommentarys',
    'comment#DELETE' => 'CommentaryApi#deleteCommentary',
    'comment#POST' => 'CommentaryApi#createCommentary',
    'comment#PUT' => 'CommentaryApi#editCommentary',
  ];
}

?>
