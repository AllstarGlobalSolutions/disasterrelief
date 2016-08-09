<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Address".
 *
 * @property integer $id
 * @property string $type
 * @property string $street1
 * @property string $street2
 * @property string $city
 * @property string $stateOrProvince
 * @property string $zipcode
 * @property string $country
 * @property integer $organizationId
 * @property integer $personId
 *
 * @property Organization $organization
 * @property Person $person
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type',  'city'], 'required'],
            [['organizationId', 'personId'], 'integer'],
            [['type', 'street1', 'street2', 'city', 'stateOrProvince', 'zipcode', 'country'], 'string', 'max' => 20],
      //      [['organizationId'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organizationId' => 'id']],
       //     [['personId'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['personId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'street1' => Yii::t('app', 'Street1'),
            'street2' => Yii::t('app', 'Street2'),
            'city' => Yii::t('app', 'City'),
            'stateOrProvince' => Yii::t('app', 'State Or Province'),
            'zipcode' => Yii::t('app', 'Zipcode'),
            'country' => Yii::t('app', 'Country'),
            'organizationId' => Yii::t('app', 'Organization ID'),
            'personId' => Yii::t('app', 'Person ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organizationId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'personId']);
    }
}
