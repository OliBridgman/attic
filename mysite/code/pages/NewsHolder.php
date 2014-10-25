<?php
class NewsHolder extends Page{
  private static $db = array();

  private static $has_one = array();

  private static $has_many = array();

  private static $many_many = array();

  private static $belongs_many_many = array();

  private static $many_many_extraFields = array();

  private static $casting = array();

  private static $default_sort = '';

  private static $field_labels = array();

  private static $summary_fields = array();

  private static $indexes = array();

  private static $required_fields = array(); //enforced through the "validate" method

  private static $searchable_fields = array();

  private static $allowed_children = array("NewsPage");

  private static $default_child = "NewsPage";

  private static $default_parent = null;

  private static $can_be_root = true;

  private static $hide_ancestor = null;
}

class NewsHolder_Controller extends Page_Controller{

  private $author;

  private static $allowed_actions = array(
    'getAuthor'
  );

  public function init() {
    parent::init();
    $this->author = (isset($_GET['author'])) ? $_GET['author'] : '';
  }

  public function getAuthor() {
    return $this->author;
  }

}