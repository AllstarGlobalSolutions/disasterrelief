<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Person".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $position
 * @property integer $organizationId
 *
 * @property Address[] $addresses
 * @property Email[] $emails
 * @property Organization $organization
 * @property Phone[] $phones
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'position'], 'required'],
            [['organizationId'], 'integer'],
            [['firstName', 'lastName', 'position'], 'string', 'max' => 20],
         //   [['organizationId'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organizationId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstName' => Yii::t('app', 'First Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'position' => Yii::t('app', 'Position'),
            'organizationId' => Yii::t('app', 'Organization ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['personId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmails()
    {
        return $this->hasMany(Email::className(), ['personId' => 'id']);
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
    public function getPhones()
    {
        return $this->hasMany(Phone::className(), ['personId' => 'id']);
    }
}
