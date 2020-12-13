<?php
/**
 * @file
 * Contains \Drupal\boardgame\Entity\Advertiser.
 */

namespace Drupal\boardgame\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the Advertiser entity.
 *
 * @ingroup boardgame
 *
 * @ContentEntityType(
 *   id = "boardgame",
 *   label = @Translation("Board Game"),
 *   base_table = "boardgame",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "boardgame_name",
 *   },
 * )
 */

class Boardgame extends ContentEntityBase implements ContentEntityInterface {
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
  {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Board game entity.'))
      ->setReadOnly(TRUE);

    return $fields;
  }
}
