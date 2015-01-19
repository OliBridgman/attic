<?php

class SearchController extends Page_Controller {

  private $tag;
  private $results;
  private $artists;
  private $releases;
  private $media;
  private $news;

  public function init() {
    parent::init();
    $this->tag = (isset($_GET['tag'])) ? $_GET['tag'] : '';
    $this->setResults();
  }

  public function Tag() {
    return $this->tag;
  }

  public function Results() {
    return $this->results;
  }

  public function Artists() {
    return $this->artists;
  }

  public function News() {
    return $this->news;
  }

  public function Media() {
    return $this->media;
  }

  public function Releases() {
    return $this->releases;
  }

  private function setResults() {
    $this->results = $this->getTags();
  }

  private function getTags() {
    if ($this->tag) {
      $tag = Tag::get()->filter(array('Title' => $this->tag))->First();
      $tagId = $tag ? $tag->ID : 0;
      if ($tagId) { 
        $this->media = MediaPage::get()->filter(array('Tags.ID' => $tagId));
        $this->artists = ArtistPage::get()->filter(array('Tags.ID' => $tagId));
        $this->news = NewsPage::get()->filter(array('Tags.ID' => $tagId));
        $this->releases = Release::get()->filter(array('Tags.ID' => $tagId));
        return 1;
      } else {
        return 0;
      }
    } else {
      return 0;
    }
  }

}