<?php

namespace Drupal\search_api\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SearchForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'search_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Create a $form API array.
    $form['board_game_search'] = array(
      '#type' => 'tel',
      '#title' => $this
        ->t('Type a name of a board game'),
    );
    $form['save'] = array(
      '#type' => 'submit',
      '#value' => $this
        ->t('Search'),
    );
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $current_path = \Drupal::service('path.current')->getPath();
    $response = new RedirectResponse($current_path . "?name=" . $form_state->getValue('board_game_search'));
    $response->send();
  }
}
