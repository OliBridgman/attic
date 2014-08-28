<?php
class ArtistPage extends Page{

  private static $db = array(
    'FacebookURL' => 'varchar(255)',
    'TwitterURL' => 'varchar(255)',
    'BandcampURL' => 'varchar(255)',
    'CartelURL' => 'varchar(255)'
  );

  private static $has_one = array();

  private static $has_many = array();

  private static $many_many = array(
    'Releases' => 'Release'
  );

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

  function getCMSFields(){
    $fields = parent::getCMSFields();

    $gridFieldConfig = GridFieldConfig_RelationEditor::create()->addComponents(
      new GridFieldDeleteAction('unlinkrelation'));
      $releasesField = new GridField(
        'Releases',
        'Releases',
        $this->Releases(),
        $gridFieldConfig
      );
    $fields->addFieldToTab('Root.Releases', $releasesField);

    $fields->addFieldToTab('Root.Main', new TextField('FacebookURL'), 'Content');
    $fields->addFieldToTab('Root.Main', new TextField('TwitterURL'), 'Content');
    $fields->addFieldToTab('Root.Main', new TextField('BandcampURL'), 'Content');
    $fields->addFieldToTab('Root.Main', new TextField('CartelURL'), 'Content');
          
    return $fields;
  }
  
}

class ArtistPage_Controller extends Page_Controller{

}
