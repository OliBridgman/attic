<?php
class MediaPage extends Page{

  private static $db = array();

  private static $has_one = array();

  private static $has_many = array();

  private static $many_many = array();

  private static $belongs_many_many = array(
    'Artist'  => 'ArtistPage'
  );

  private static $many_many_extraFields = array();

  private static $casting = array();

  private static $default_sort = '';

  private static $field_labels = array();

  private static $summary_fields = array();

  private static $indexes = array();

  private static $required_fields = array(); //enforced through the "validate" method

  private static $searchable_fields = array();

  private static $allowed_children = array();

  private static $default_child = "";

  private static $default_parent = null;

  private static $can_be_root = true;

  private static $hide_ancestor = null;
  
}

class MediaPage_Controller extends Page_Controller{

}
