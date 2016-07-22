<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $fullname
 * @property string $fullname_zh
 * @property string $sortname
 * @property string $photo
 * @property \Cake\I18n\Time $birthday
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $party_id
 *
 * @property \App\Model\Entity\Party $party
 * @property \App\Model\Entity\Group[] $groups
 */
class Person extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
