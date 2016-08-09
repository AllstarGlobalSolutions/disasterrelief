<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Event}}".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $dateOccurred
 * @property string $description
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Event}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'dateOccurred', 'description'], 'required'],
            [['dateOccurred'], 'safe'],
            [['type', 'name'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 50],
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
            'name' => Yii::t('app', 'Name'),
            'dateOccurred' => Yii::t('app', 'Date Occurred'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
