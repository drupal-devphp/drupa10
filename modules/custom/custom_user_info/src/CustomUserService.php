<?php

namespace Drupal\custom_user_info;

use Drupal\Core\Session\AccountProxyInterface;

class CustomUserService {

  protected $accountProxy;

  public function __construct(AccountProxyInterface $accountProxy) {
    $this->accountProxy = $accountProxy;
  }

  public function getCurrentUserEmail() {
    return $this->accountProxy->getEmail();
  }
}
