<?php
class MediaPage extends Page{

  private static $db = array();

  private static $has_one = array();

  private static $has_many = array(
    'Images'  => 'Media_Image',
    'Videos'  => 'Media_Video'
  );

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

  function getCMSFields(){
    $fields = parent::getCMSFields();

    $fields->addFieldToTab('Root.Main', $imageUpload = new UploadField('Images', 'Images'), 'Content');
    $imageUpload->setAllowedExtensions(array(
        'jpg',
        'jpeg',
        'gif',
        'png',
        'pjpeg'
    ));
    $fields->addFieldToTab('Root.Main', $videoURL = new TextField('Videos', 'Videos'), 'Content');

    $gridFieldConfig = GridFieldConfig_RelationEditor::create()->addComponents(
      new GridFieldDeleteAction('unlinkrelation'));
      $videosField = new GridField(
        'Videos',
        'Videos',
        $this->Videos(),
        $gridFieldConfig
      );
    $fields->addFieldToTab('Root.Main', $videosField, 'Content');

    return $fields;
  }
}

class MediaPage_Controller extends Page_Controller{

}

class Media_Image extends Image {
  private static $has_one = array(
    'MediaPage' => 'MediaPage'
  );
}

class Media_Video extends DataObject {
  private static $db = array(
    'Title'     => 'Varchar(255)',
    'VideoURL'  => 'Varchar(255)'
  );
  private static $has_one = array(
    'MediaPage' => 'MediaPage'
  );
  private static $summary_fields = array(
    'Title',
    'VideoURL'
  );
}