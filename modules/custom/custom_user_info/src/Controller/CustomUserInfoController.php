<?php

namespace Drupal\custom_user_info\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * Controller for displaying the current logged-in user's username.
 */
class CustomUserInfoController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  protected function getModuleName() {
    return 'custom_user_info';
  }

  /**
   * Controller content callback.
   */
  public function content() {
    // Get the current user.
    $current_user = \Drupal::currentUser();

    // Display the username.
    return [
      '#markup' => $this->t('Hello, @username!', ['@username' => $current_user->getAccountName()]),
    ];
  }

}
