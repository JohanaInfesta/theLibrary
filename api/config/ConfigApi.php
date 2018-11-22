<?php

class ConfigApi {

  public static $RESOURCE = 'resource';
  public static $PARAMS = 'params';
  public static $RESOURCES = [

    'commentary#GET' => 'CommentaryApi#getCommentarys',
    'commentary#DELETE' => 'CommentaryApi#deleteCommentary',
    'commentary#POST' => 'CommentaryApi#createCommentary',
    'commentary#PUT' => 'CommentaryApi#editCommentary',
  ];
}

?>
