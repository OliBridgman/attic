<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

	private static $many_many = array(
		'Tags' => 'Tag'
	);

}
class Page_Controller extends ContentController {
	private $tag;
	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array(
		'SearchByTag'
	);

	public function init() {
		parent::init();
		$this->tag = (isset($_GET['tag'])) ? $_GET['tag'] : '';
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}

	public function FeaturedReleases() {
		return Release::get()->filter('FeaturedRelease', true);
	}

	public function FeaturedMedia() {
		return MediaPage::get()->filter('FeaturedMedia', true);
	}

	public function SearchByTag() {
		if ($this->tag) {
			$tagItem = Tag::get()->filter(array('Title' => $this->tag))->First();
			// print_r($tagItem);
			$pages = Page::get()->filter('Tags', $tagItem)->First();
			print_r($pages);
		}
	}

}
