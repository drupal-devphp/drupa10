<?php
namespace Drupal\my_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class UserDisplayController extends ControllerBase {
  public function displayUser() {
    $current_user = \Drupal::currentUser();
    $username = $current_user->getAccountName();
    return [
      '#markup' => 'Hello, ' . $username . '!',
    ];
  }
}