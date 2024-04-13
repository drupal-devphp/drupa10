<?php

namespace Drupal\custom_user_info\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CustomFormExampleForm extends FormBase {

  public function getFormId() {
    return 'custom_form_example_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#required' => TRUE,
    ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#required' => TRUE,
    ];

    $form['address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Address'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $first_name = $form_state->getValue('first_name');
    $last_name = $form_state->getValue('last_name');
    $address = $form_state->getValue('address');

    // Validate first name and last name to allow only letters and spaces.
    if (!preg_match('/^[a-zA-Z\s]+$/', $first_name)) {
      $form_state->setErrorByName('first_name', $this->t('First Name should contain only letters and spaces.'));
    }

    if (!preg_match('/^[a-zA-Z\s]+$/', $last_name)) {
      $form_state->setErrorByName('last_name', $this->t('Last Name should contain only letters and spaces.'));
    }

    // Validate address to allow letters, numbers, spaces, and commas.
    if (!preg_match('/^[a-zA-Z0-9\s,]+$/', $address)) {
      $form_state->setErrorByName('address', $this->t('Address should contain only letters, numbers, spaces, and commas.'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Handle form submission here.
    // You can access the submitted values using $form_state->getValue().
    $first_name = $form_state->getValue('first_name');
    $last_name = $form_state->getValue('last_name');
    $address = $form_state->getValue('address');

    // Print the submitted data (for demonstration purposes).
    \Drupal::messenger()->addMessage($this->t('First Name: @first_name, Last Name: @last_name, Address: @address', [
      '@first_name' => $first_name,
      '@last_name' => $last_name,
      '@address' => $address,
    ]));
  }
}
