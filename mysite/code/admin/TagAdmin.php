<?php
class TagAdmin extends ModelAdmin{
  private static $managed_models = array(
    'Tag'
  );

  public static $url_segment = 'tags';

  public static $menu_title = 'Tags';
}