<?php

namespace Drupal\custom_user_info\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Custom Form' block.
 *
 * @Block(
 *   id = "place_form_block",
 *   admin_label = @Translation("Place Form Block"),
 * )
 */
class PlaceFormBlock extends BlockBase {

  public function build() {
    return \Drupal::formBuilder()->getForm('Drupal\custom_user_info\Form\CustomFormExampleForm');
  }

}
