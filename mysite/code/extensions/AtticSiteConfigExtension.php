<?php
class AtticSiteConfigExtension extends DataExtension{
  private static $has_one = array(
    'BannerImage' => 'Image'
  );

  public function updateCMSFields(FieldList $fields) {
    $topUpload = new UploadField('BannerImage', 'Banner Image');
    $topUpload->setAllowedExtensions(array(
        'jpg',
        'jpeg',
        'gif',
        'png',
        'pjpeg'
    ));
    $fields->addFieldToTab('Root.Main', $topUpload);
  }
}