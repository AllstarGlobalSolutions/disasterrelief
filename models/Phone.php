<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Phone".
 *
 * @property integer $id
 * @property string $type
 * @property string $countryCode
 * @property string $number
 * @property integer $organizationId
 * @property integer $personId
 *
 * @property Organization $organization
 * @property Person $person
 */
class Phone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'countryCode', 'number'], 'required'],
            [['organizationId', 'personId'], 'integer'],
            [['type', 'countryCode', 'number'], 'string', 'max' => 20],

          //  [['organizationId'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organizationId' => 'id']],
          //  [['personId'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['personId' => 'id']],
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
            'countryCode' => Yii::t('app', 'Country Code'),
            'number' => Yii::t('app', 'Number'),
            'organizationId' => Yii::t('app', 'Organization ID'),
            'personId' => Yii::t('app', 'Person ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
 /*   public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organizationId']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
  /*  public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'personId']);
    }*/
}
