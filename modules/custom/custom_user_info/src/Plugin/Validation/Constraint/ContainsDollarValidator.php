<?php

// your_module/src/Plugin/Validation/Constraint/ContainsDollarValidator.php
namespace Drupal\custom_user_info\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the ContainsDollar constraint.
 */
class ContainsDollarValidator extends ConstraintValidator {
  public function validate($items, Constraint $constraint) {
    foreach ($items as $item) {
      $value = $item->value;
      // Check if the value contains the $ sign.
      if (strpos($value, '$') === false) {
        $this->context->addViolation($constraint->dollarMessage, ['%string%' => $value]);
      }

      // Check if the value has a length of exactly 6 characters.
      if (strlen($value) !== 6) {
        $this->context->addViolation($constraint->lengthMessage, ['%string%' => $value]);
      }

      // Check if the value has a length of exactly 6 characters.
      if (empty($value)) {
        $this->context->addViolation($constraint->notemptyMessage, ['%string%' => $value]);
      }
    }
  }
}
