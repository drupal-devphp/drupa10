<?php

namespace Drupal\custom_user_info\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Drupal Academy' block.
 *
 * @Block(
 *   id = "drupal_academy_block",
 *   admin_label = @Translation("Drupal Academy Block"),
 * )
 */
class DrupalAcademyBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t('Welcome to Drupal Academy!'),
    ];
  }
}
