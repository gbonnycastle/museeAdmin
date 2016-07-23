<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locators Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Contacts
 *
 * @method \App\Model\Entity\Locator get($primaryKey, $options = [])
 * @method \App\Model\Entity\Locator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Locator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Locator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Locator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Locator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Locator findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LocatorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('locators');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Contacts', [
            'foreignKey' => 'contact_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('locator_type')
            ->requirePresence('locator_type', 'create')
            ->notEmpty('locator_type');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->allowEmpty('info');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['contact_id'], 'Contacts'));

        return $rules;
    }
}
