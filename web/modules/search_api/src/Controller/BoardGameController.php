<?php

namespace Drupal\search_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\search_api\SearchAPISearchBar;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Class BoardGameController
 * @return array
 *    Our message in a render array
 */

class BoardGameController extends ControllerBase {
  /**
   * The search bar service
   *
   * @var SearchAPISearchBar
   */
  protected $searchbar;

  /**
   * SearchAPIController constructor.
   * @param SearchApiSearchBar $searchbar
   */
  public function __construct(SearchApiSearchBar $searchbar) {
    $this->searchbar = $searchbar;
  }

  /**
   * @param ContainerInterface $container
   * @return BoardGameController|static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('search_api.save')
    );
  }

  public function content(): array {
    $id = \Drupal::routeMatch()->getParameter('param');
    $exists = $this->searchbar->boardGameExists($id);
    if(!$exists){
      $boardGameData = $this->searchbar->getBoardGameFromApi($id);
      $this->searchbar->saveBoardGame($id, $boardGameData);
      return [
        $content = [
          '#theme' => 'item_list',
          '#list_type' => 'ul',
          '#title' => 'My List',
          '#items' => $boardGameData,
          '#attributes' => ['class' => 'mylist'],
          '#wrapper_attributes' => ['class' => 'container'],
        ],
      ];
    }
    else{
      //Save it and show it
    }
  }
}
