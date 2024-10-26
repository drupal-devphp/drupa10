<?php

namespace Drupal\phone_number_mask\TwigExtension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class PhoneNumberMaskExtension extends AbstractExtension {
  
  /**
   * {@inheritdoc}
   */
  public function getFilters() {
    return [
      new TwigFilter('mask_phone', [$this, 'maskPhoneNumber']),
    ];
  }

  /**
   *  Mask the first 7 digits of a phone number
   * 
   * @param string $phone_number
   *  The original phone number.
   * 
   * @return string
   *  The masked phone number(eg *******787).
   */
  public function maskPhoneNumber($phone_number, $digits_to_mask =7) {
    if (preg_match('/^\d{10}$/', $phone_number)) {
      $digits_to_mask = min($digits_to_mask, 9);
      $masked_part = str_repeat('*', $digits_to_mask);
      $visible_part = substr($phone_number, $digits_to_mask);
      return $masked_part . $visible_part;
    }
    return $phone_number;
  }

}
