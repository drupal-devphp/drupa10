<?php

namespace Drupal\custom_user_info\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'Custom Form' block.
 *
 * @Block(
 *   id = "custom_form_block",
 *   admin_label = @Translation("Custom Form Block"),
 * )
 */
class CustomFormBlock extends BlockBase implements ContainerFactoryPluginInterface {

  protected $formBuilder;

  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilderInterface $form_builder) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->formBuilder = $form_builder;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('form_builder')
    );
  }

  public function build() {
    return $this->formBuilder->getForm('Drupal\custom_user_info\Form\CustomFormExampleForm');
  }

}
