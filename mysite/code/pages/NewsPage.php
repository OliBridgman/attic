<?php
class NewsPage extends Page{
  private static $db = array(
    'Date'    => 'Date',
    'Author'  => 'Varchar(255)'
  );

  private static $has_one = array(
    'BannerImage' => 'Image'
  );

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

  private static $allowed_children = array();

  private static $default_child = "";

  private static $default_parent = null;

  private static $can_be_root = true;

  private static $hide_ancestor = null;

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    $dateField = new DateField('Date');
    $dateField->setConfig('showcalendar', true);
    $fields->addFieldToTab('Root.Main', $dateField, 'Content');
    $fields->addFieldToTab('Root.Main', new TextField('Author'), 'Content');
    $fields->addFieldToTab('Root.Main', $topUpload = new UploadField('BannerImage', 'Banner Image'), 'Content');
    $topUpload->setAllowedExtensions(array(
        'jpg',
        'jpeg',
        'gif',
        'png',
        'pjpeg'
    ));
    return $fields;
  }
}

class NewsPage_Controller extends Page_Controller{

}