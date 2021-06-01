<?php

class CRM_Volunteer_Angular {

  private static $loaded = FALSE;

  /**
   * @return boolean
   */
  public static function isLoaded() {
    return self::$loaded;
  }

  /**
   * Loads dependencies for CiviVolunteer Angular app.
   *
   * @param string $defaultRoute
   *   If the base page is loaded with no route, show this one.
   */
  public static function load($defaultRoute) {
    if (self::isLoaded()) {
      return;
    }

    CRM_Core_Resources::singleton()->addScriptFile('civicrm.packages', 'jquery/plugins/jquery.notify.min.js', 10, 'html-header');

    $loader = Civi::service('angularjs.loader');
    $loader->addModules(['volunteer']);
    $loader->setPageName('civicrm/vol');
    \Civi::resources()->addSetting([
      'crmApp' => [
        'defaultRoute' => $defaultRoute,
      ],
    ]);

    self::$loaded = TRUE;
  }

}
