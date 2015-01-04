<?php
class MediaPage extends Page{

  private static $db = array(
    'FeaturedMedia'     => 'Boolean',
    'FeaturedMediaDate' => 'SS_DateTime'
  );

  private static $has_one = array(
    'PreviewImage' => 'Image',
    'BannerImage' => 'Image'
  );

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

  public function getCMSFields(){
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

    $fields->addFieldToTab('Root.Main', new CheckboxField('FeaturedMedia', 'FeaturedMedia'), 'Content');

    $gridFieldConfig = GridFieldConfig_RelationEditor::create()->addComponents(
      new GridFieldDeleteAction('unlinkrelation'));
      $tagsField = new GridField(
        'Tags',
        'Tags',
        $this->Tags(),
        $gridFieldConfig
      );
    $fields->addFieldToTab('Root.Tags', $tagsField);

    return $fields;
  }

  public function onBeforeWrite(){
    // Set/Unset Featured Media
    if ($this->FeaturedMedia && $this->FeaturedMediaDate == NULL) {
      $date = date('Y-m-d H:i:s');
      $this->FeaturedMediaDate = $date;
      $currentlyFeatured = MediaPage::get()->filter(array(
        'FeaturedMedia' => true
      ))->sort('FeaturedMediaDate DESC')->toArray();
      if (sizeof($currentlyFeatured) == 3){ // Max number of featured MediaPages
        $unfeaturedMedia = array_pop($currentlyFeatured);
        $unfeaturedMedia->FeaturedMedia = false;
        $unfeaturedMedia->FeaturedMediaDate = NULL;
        $unfeaturedMedia->write();
      }
    }
    parent::onBeforeWrite();
  }

  public function PreviewImage() {
    return $this->Images()->First();
  }
}

class MediaPage_Controller extends Page_Controller{

  private static $allowed_actions = array(
    'saveButton'
  );

  public function init() {
    parent::init();
    Requirements::javascript("themes/attic/javascripts/masonry.pkgd.min.js");
  }
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
  public function EmbedVideo() {
    $oembed = Oembed::get_oembed_from_url($this->VideoURL);
    if(!$oembed) return null;
    return $oembed->forTemplate();
  }
}