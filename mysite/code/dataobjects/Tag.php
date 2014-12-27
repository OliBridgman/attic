<?php
class Tag extends DataObject{

  private static $db = array(
    'Title' => 'Varchar(255)',
  );

  private static $belongs_to_many = array(
    'Releases'  => 'Release',
    'Pages'     => 'Page',
  );
}