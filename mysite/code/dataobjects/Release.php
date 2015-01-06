<?php
class Release extends DataObject{

  private static $db = array(
    'Title'               => 'Varchar(255)',
    'ReleaseNo'           => 'Varchar(255)',
    'ReleaseDate'         => 'Date',
    'BandcampURL'         => 'Varchar(255)',
    'FeaturedRelease'     => 'Boolean',
    'FeaturedReleaseDate' => 'SS_DateTime',
    'URLSegment'          => 'Varchar(255)',
    'TrackOne'            => 'Varchar(255)',
    'TrackTwo'            => 'Varchar(255)',
    'TrackThree'          => 'Varchar(255)',
    'Content'             => 'HTMLText',
    'MetaInfo'            => 'HTMLText'
  );

  private static $has_one = array(
    'PreviewImage' => 'Image',
    'BannerImage' => 'Image'
  );

  private static $many_many = array(
    'Tags' => 'Tag'
  );

  private static $belongs_many_many = array(
    'Artist' => 'ArtistPage'
  );

  private static $summary_fields = array(
    'Title',
    'ReleaseNo'
  );

  public function getCMSFields() {
    $fields = parent::getCMSFields();

    $fields->removeByName('URLSegment');
    $fields->removeByName('ReleaseDate');
    $fields->removeByName('FeaturedReleaseDate');
    $fields->removeByName('PreviewImage');
    $fields->removeByName('BannerImage');

    DateField::set_default_config('showcalendar', true);
    $fields->addFieldToTab('Root.Main', new DateField('ReleaseDate', 'ReleaseDate'), 'Content');
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
    return $fields;
  }

  public function onBeforeWrite() {
    // Build URL
    if((!$this->URLSegment || $this->URLSegment == 'new-release') && $this->Title != 'New Release') {
      $filter = URLSegmentFilter::create();
      $this->URLSegment = $filter->filter($this->Title);
    }
    else if($this->isChanged('URLSegment')) {
      $segment = preg_replace('/[^A-Za-z0-9]+/','-',$this->URLSegment);
      $segment = preg_replace('/-+/','-',$segment);

      if(!$segment) {
        $segment = "release-$this->ID";
      }
      $this->URLSegment = $segment;
    }

    $count = 2;
    while($this->LookForExistingURLSegment($this->URLSegment)) {
      $this->URLSegment = preg_replace('/-[0-9]+$/', null, $this->URLSegment) . '-' . $count;
      $count++;
    }
    // Set/Unset Featured Release
    if ($this->FeaturedRelease && $this->FeaturedReleaseDate == NULL) {
      $date = date('Y-m-d H:i:s');
      $this->FeaturedReleaseDate = $date;
      $currentlyFeatured = Release::get()->filter(array(
        'FeaturedRelease' => true
      ))->sort('FeaturedReleaseDate DESC')->toArray();
      if (sizeof($currentlyFeatured) == 3){ // Max number of featured releases
        $unfeaturedRelease = array_pop($currentlyFeatured);
        $unfeaturedRelease->FeaturedRelease = false;
        $unfeaturedRelease->FeaturedReleaseDate = NULL;
        $unfeaturedRelease->write();
      }
    }
    parent::onBeforeWrite();
  }

  public function ReleaseLink() {
    $releaseHolder = ReleaseHolder::get()->First();
    return Controller::join_links($releaseHolder->URLSegment, "view", $this->URLSegment);
  }

  //Test whether the URLSegment exists on another Release
  private function LookForExistingURLSegment($URLSegment) {
    return (DataObject::get_one('Release', "URLSegment = '" . $URLSegment ."' AND ID != " . $this->ID));
  }

  public function IsCompilation() {
    return $this->Artist()->first() != $this->Artist()->last();
  }

  public function SingleArtistName() {
    return $this->Artist()->first()->title;
  }
}