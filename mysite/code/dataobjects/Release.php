<?php
class Release extends DataObject{

  private static $db = array(
    'Title'           => 'Varchar(255)',
    'ReleaseNo'       => 'Varchar(255)',
    'ReleaseDate'     => 'Date',
    'Content'         => 'HTMLText',
    'BandcampURL'     => 'Varchar(255)',
    'FeaturedRelease' => 'Boolean',
    'URLSegment'      => 'Varchar(255)'
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
  }
}