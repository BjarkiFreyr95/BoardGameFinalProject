<?php

namespace Drupal\search_api;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\search\Form\SearchBlockForm;
use Drupal\search_api\Form;


class SearchAPISearchBar
{
  use StringTranslationTrait;

  public function getSearchBar()
  {
    return \Drupal::formBuilder()->getForm(Form\SearchForm::class);;
  }

  private function extractElement($input, $needle, $beginat, $stopAt)
  {
    $lastPos = 0;
    $positions = array();
    $lastPos = 0;
    $toRet = array();
    while (($lastPos = strpos($input, $needle, $lastPos)) !== false) {
      $str_lenuntil = strpos(substr($input, $lastPos + strlen($needle), -1), $beginat);
      array_push($positions, $lastPos + strlen($needle) + $str_lenuntil + strlen($beginat));
      $lastPos = $lastPos + $str_lenuntil;
    }
    for ($x = 0; $x < sizeof($positions); $x++) {
      $s_str = substr($input, $positions[$x], strpos(substr($input, $positions[$x], -1), $stopAt));
      array_push($toRet, $s_str);
    }
    return $toRet;
  }


  private function createURL($preceedingurl, $listOfExceeding)
  {
    $toRet = array();
    for ($x = 0; $x < sizeof($listOfExceeding); $x++) {
      array_push($toRet, $preceedingurl . $listOfExceeding[$x]);
    }
    return $toRet;
  }

  private function createRenderedArray($column1, $column2, $column1Name, $column2Name)
  {
    return "";
  }

  private function addSaveButtons($arr, $ids)
  {
    /*foreach($arr as &$i) {
      $i = [$i,         $form['save'] = array(
        '#type' => 'submit',
        '#value' => $this
          ->t('Search'),
      )];
    }*/
    $temp = [];
    foreach ($arr as $key => $i) {
      $temp[] = $i;
      $temp[] = \Drupal::formBuilder()->getForm(Form\SaveForm::class, $ids[$key]);
    }
    return $temp;
  }

  public function getBoardGameFromApi($id)
  {
    if ($id !== "") {
      $baseurl = "https://www.boardgamegeek.com/xmlapi2/thing?id=" . $id . "&videos=1";
      $response = \Drupal::httpClient()->get($baseurl);
      $data = $response->getBody();
      $toRet = array();
      $nameField = $this->extractElement($data, '<name', 'value="', '"');
      if (empty($nameField)) {
        array_push($toRet, "unknown name");
      } else {
        array_push($toRet, $nameField[0]);
      }
      $descriptionField = $this->extractElement($data, '<descriptio', '>', '</');
      if (empty($descriptionField)) {
        array_push($toRet, "unknown description");
      } else {
        array_push($toRet, $descriptionField[0]);
      }
      return $toRet;
    } else {
      return "";
    }
  }

  public function getBoardGames($name)
  {
    if ($name !== "") {
      $changedName = str_replace(" ", "%", $name);
      //https://www.boardgamegeek.com/xmlapi2/?query=SEARCH_QUERY
      $baseurl = "https://www.boardgamegeek.com/xmlapi/search?search=" . $changedName;
      #$response = \Drupal::httpClient()->get($baseurl, array('headers' => array('Accept' => 'text/plan')));
      $response = \Drupal::httpClient()->get($baseurl);
      $data = $response->getBody();
      $names = $this->extractElement($data, '<name', '>', '<');
      $boardgameids = $this->extractElement($data, '<boardgame objectid', '"', '"');
      $names = $this->addSaveButtons($names, $boardgameids);
      $boardgameURLs = $this->createURL("https://boardgamegeek.com/boardgame/", $boardgameids);
      //$combined_arr = implode(" ", array_merge($names, $boardgameURLs));
      return $names;
    } else {
      return "";
    }
  }

  public function boardGameExists($id): bool
  {
    return false;
  }

  public function saveBoardGame($id, $data)
  {
    $values = [
      'type' => 'board_game',
      'title' => $data[0],
      'field_description' => $data[1],
      'field_name' => $data[0]
    ];
    /** @var  \Drupal\node\NodeInterface */
    $node = \Drupal::entityTypeManager()->getStorage('node')->create($values);
    $node->save();

  }
}
