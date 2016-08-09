<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Donation}}".
 *
 * @property integer $id
 * @property integer $needID
 * @property integer $donorID
 * @property string $type
 * @property integer $amount
 */
class Donation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Donation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['needID', 'donorID', 'type', 'amount'], 'required'],
            [['needID', 'donorID', 'amount'], 'integer'],
            [['type'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'needID' => Yii::t('app', 'Need ID'),
            'donorID' => Yii::t('app', 'Donor ID'),
            'type' => Yii::t('app', 'Type'),
            'amount' => Yii::t('app', 'Amount'),
        ];
    }
}
