<?php
class ArtistPage extends Page{

  private static $db = array(
    'FacebookURL' => 'varchar(255)',
    'TwitterURL'  => 'varchar(255)',
    'BandcampURL' => 'varchar(255)',
    'CartelURL'   => 'varchar(255)'
  );

  private static $has_one = array(
    'PreviewImage'  => 'Image',
    'BannerImage' => 'Image'
  );

  private static $has_many = array();

  private static $many_many = array(
    'Releases'  => 'Release',
    'Media'     => 'MediaPage'
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
    $fields->addFieldToTab('Root.Main', $previewUpload = new UploadField('PreviewImage', 'Preview Image'), 'Content');
    $previewUpload->setAllowedExtensions(array(
        'jpg',
        'jpeg',
        'gif',
        'png',
        'pjpeg'
    ));
    $fields->addFieldToTab('Root.Main', $bannerUpload = new UploadField('BannerImage', 'Banner Image'), 'Content');
    $bannerUpload->setAllowedExtensions(array(
        'jpg',
        'jpeg',
        'gif',
        'png',
        'pjpeg'
    ));
    $fields->addFieldToTab('Root.Main', new TextField('FacebookURL'), 'Content');
    $fields->addFieldToTab('Root.Main', new TextField('TwitterURL'), 'Content');
    $fields->addFieldToTab('Root.Main', new TextField('BandcampURL'), 'Content');
    $fields->addFieldToTab('Root.Main', new TextField('CartelURL'), 'Content');
    $gridFieldConfig = GridFieldConfig_RelationEditor::create()->addComponents(
      new GridFieldDeleteAction('unlinkrelation'));
      $releasesField = new GridField(
        'Releases',
        'Releases',
        $this->Releases(),
        $gridFieldConfig
      );
    $fields->addFieldToTab('Root.Main', $releasesField, 'Content');

    $gridFieldConfig = GridFieldConfig_RelationEditor::create()->addComponents(
      new GridFieldDeleteAction('unlinkrelation'));
      $mediaField = new GridField(
        'Media',
        'Media',
        $this->Media(),
        $gridFieldConfig
      );
    $fields->addFieldToTab('Root.Main', $mediaField, 'Content');

    return $fields;
  }
  
}

class ArtistPage_Controller extends Page_Controller{

}
