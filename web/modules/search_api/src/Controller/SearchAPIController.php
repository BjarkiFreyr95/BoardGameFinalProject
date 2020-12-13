<?php

namespace Drupal\search_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\search_api\SearchAPISearchBar;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Class SearchAPIController
 * @return array
 *    Our message in a render array
 */

class SearchAPIController extends ControllerBase {
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
   * @return SearchAPIController|static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('search_api.searchbar')
    );
  }


  public function searchAPI(): array
  {
    $namequery = \Drupal::request()->query->get('name');
    if(mb_strlen($namequery) > 0){
      $fields = $this->searchbar->getBoardGames($namequery);
      return [
        $this->searchbar->getSearchBar(),
        $content = [
          '#theme' => 'item_list',
          '#list_type' => 'ul',
          '#title' => 'My List',
          '#items' => $fields,
          '#attributes' => ['class' => 'mylist'],
          '#wrapper_attributes' => ['class' => 'container'],
        ],

      #'#plain_text' => $this->searchbar->getBoardGames($namequery)
      ];
    }
    else{
      return [
        $this->searchbar->getSearchBar()
      ];
    }
  }
}
