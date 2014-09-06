<?php
class Release extends DataObject{

  private static $db = array(
    'Title'           => 'Varchar(255)',
    'ReleaseNo'       => 'Varchar(255)',
    'ReleaseDate'     => 'Date',
    'BandcampURL'     => 'Varchar(255)',
    'FeaturedRelease' => 'Boolean',
    'URLSegment'      => 'Varchar(255)',
    'Content'         => 'HTMLText'
  );

  private static $has_one = array(
    'TopImage' => 'Image'
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
    $fields->removeByName('FeaturedRelease');
    $fields->removeByName('TopImage');

    DateField::set_default_config('showcalendar', true);
    $fields->addFieldToTab('Root.Main', new DateField('ReleaseDate', 'ReleaseDate'), 'Content');
    $fields->addFieldToTab('Root.Main', new CheckboxField('FeaturedRelease'), 'Content');
    $fields->addFieldToTab('Root.Main', $topUpload = new UploadField('TopImage', 'Top Image'), 'Content');
    $topUpload->setAllowedExtensions(array(
        'jpg',
        'jpeg',
        'gif',
        'png',
        'pjpeg'
    ));
    return $fields;
  }

  public function onBeforeWrite() {
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
    parent::onBeforeWrite();
  }

  //Test whether the URLSegment exists on another Release
  function LookForExistingURLSegment($URLSegment) {
    return (DataObject::get_one('Release', "URLSegment = '" . $URLSegment ."' AND ID != " . $this->ID));
  }
}