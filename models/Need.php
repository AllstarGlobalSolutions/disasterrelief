<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Need}}".
 *
 * @property integer $id
 * @property integer $disasterID
 * @property string $type
 * @property string $forWhom
 * @property integer $amount
 * @property integer $detailedDescriptionOfNeed
 */
class Need extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Need}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['disasterID', 'type', 'forWhom', 'amount', 'detailedDescriptionOfNeed'], 'required'],
            [['disasterID', 'amount', 'detailedDescriptionOfNeed'], 'integer'],
            [['type', 'forWhom'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'disasterID' => Yii::t('app', 'Disaster ID'),
            'type' => Yii::t('app', 'Type'),
            'forWhom' => Yii::t('app', 'For Whom'),
            'amount' => Yii::t('app', 'Amount'),
            'detailedDescriptionOfNeed' => Yii::t('app', 'Detailed Description Of Need'),
        ];
    }
}
