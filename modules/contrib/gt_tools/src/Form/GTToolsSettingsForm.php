<?php

namespace Drupal\gt_tools\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class GTToolsSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'gt_tools_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'gt_tools.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // get the current configuration
    $config = $this->config('gt_tools.settings');

    // get all y'all's text formats
    $formats = \Drupal::entityQuery('filter_format')
        ->execute();
    // use limited_html if it exists
    $default_format = array_search('limited_html', $formats) ? 'limited_html' : 'plain_text';
    // get the format entities and make a nice set of options
    $storage_handler = \Drupal::entityTypeManager()->getStorage('filter_format');
    $entities = $storage_handler->loadMultiple($formats);
    foreach ($formats as $format) {
      $formats[$format] = $entities[$format]->get('name');
    }

    // Mercury URL — variable to allow for debugging with a local copy of Mercury
    $form['hg_url'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Mercury URL'),
      '#default_value' => $config->get('hg_url') ?: 'hg.gatech.edu',
    );

    // cURL timeout
    $form['hg_curl_timeout'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('cURL timeout'),
      '#default_value' => $config->get('hg_curl_timeout') ?: 10,
    );

    // default text format
    $form['hg_text_format'] = array(
      '#type' => 'select',
      '#options' => $formats,
      '#title' => $this->t('Default text format'),
      '#default_value' => $config->get('hg_text_format') ?: $default_format,
    );

    // bye!
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    // $this->config('hg_reader.settings')
    //   ->set('hg_url', $values['hg_url'])
    //   ->set('hg_curl_timeout', $values['hg_curl_timeout'])
    //   ->set('hg_text_format', $values['hg_text_format'])
    //   ->save();
  }

}
