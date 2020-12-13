<?php

namespace  Drupal\search_api\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\search_api\SearchAPISearchBar;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\search_api;

class SaveForm extends Formbase {
  /**
   * The search bar service
   *
   * @var SearchAPISearchBar
   */
  protected $searchbar;
  public function setPlugin(SearchAPISearchBar $plugin){
    $this->searchbar = $plugin;
  }

  public function getFormId()
  {
    return 'save_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $id = NULL)
  {

    $form['save'] = array(
      '#type' => 'submit',
      '#value' =>  $this
        ->t('Save'),
    );
    $form_state->set('board_game_id', $id);
    return $form;
  }


  public function submitForm(array &$form, FormStateInterface $form_state) {
    $id = $form_state->get('board_game_id');
    $current_path = \Drupal::service('path.current')->getPath();
    $response = new RedirectResponse(substr($current_path, 0, -9) . "boardgames/" . $id);
    $response->send();
  }

}
