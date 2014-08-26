<?php
class ReleaseAdmin extends ModelAdmin{
  private static $managed_models = array(
    'Release'
  );

  public static $url_segment = 'releases';

  public static $menu_title = 'Releases';
}