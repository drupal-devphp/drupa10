<?php

namespace Drupal\my_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * User display class.
 */
class UserDisplayController extends ControllerBase {

  /**
   * Display User.
   */
  public function displayUser() {
    $current_user = \Drupal::currentUser();
    $username = $current_user->getAccountName();
    return ['#markup' => 'Hello, ' . $username . '!'];
  }

}
