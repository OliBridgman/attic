<?php
class ReleaseHolder extends Page{

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

  private static $allowed_children = array();

  private static $default_child = "";

  private static $default_parent = null;

  private static $can_be_root = true;

  private static $hide_ancestor = null;
  
}

class ReleaseHolder_Controller extends Page_Controller{

  private static $allowed_actions = array(
    'view'
  );

  public function AllReleases(){
    return PaginatedList::create(
      Release::get()->sort('ReleaseNo ASC'),
      $this->request
    )->setPageLength(10);
  }

  public function view(){
    $releases = $this->CurrentRelease();
    if($releases && $releases->isInDB()) {
      return array(
        'Release' => $releases
      );
    }

    return $this->redirect(Director::absoluteBaseURL());
  }

  public function CurrentRelease() {
    $urlParams = $this->getURLParams();

    $releases = Release::get()
      ->filter('URLSegment', $urlParams['ID'])
      ->First();

    return $releases;
  }

  public function ReleasesLink(){
    return Page::get()->filter('Title', 'Releases')->First();
  }

}
