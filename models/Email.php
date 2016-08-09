<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Email".
 *
 * @property integer $id
 * @property string $type
 * @property string $address
 * @property integer $organizationId
 * @property integer $personId
 *
 * @property Organization $organization
 * @property Person $person
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'address'], 'required'],
            [['organizationId', 'personId'], 'integer'],
            [['type'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 30],
        //    [['organizationId'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organizationId' => 'id']],
        //   [['personId'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['personId' => 'id']],
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
            'address' => Yii::t('app', 'Address'),
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
