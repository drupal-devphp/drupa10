<?php

// your_module/src/Plugin/Validation/Constraint/ContainsDollar.php
namespace Drupal\custom_user_info\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Constraint for the ContainsDollar constraint.
 *
 * @Constraint(
 *   id = "contains_dollar",
 *   label = @Translation("Contains Dollar", context = "Validation"),
 * )
 */
class ContainsDollar extends Constraint {
  public $dollarMessage = 'The string "%string%" must contain the $ character.';
  public $notemptyMessage = 'The string "%string%" must not be empty.';
  public $lengthMessage = 'The string "%string%" must have exactly 6 characters.';
}
