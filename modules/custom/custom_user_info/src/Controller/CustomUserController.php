<?php

namespace Drupal\custom_user_info\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\custom_user_info\CustomUserService;

class CustomUserController extends ControllerBase {

  protected $customUserService;

  public function __construct(CustomUserService $customUserService) {
    $this->customUserService = $customUserService;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('custom_user_info.current_user_email')
    );
  }

  public function displayEmail() {
    $email = $this->customUserService->getCurrentUserEmail();
    return [
      '#markup' => '<p>' . $email . '</p>',
    ];
  }
}
