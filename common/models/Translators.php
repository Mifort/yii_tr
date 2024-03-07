<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "translators".
 *
 * @property int $t_id
 * @property string|null $t_name
 * @property int|null $t_wa
 *
 * @property WorkingActivity $tWa
 */
class Translators extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translators';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['t_wa'], 'integer'],
            [['t_name'], 'string', 'max' => 150],
            [['t_name'], 'required'],
            [['t_wa'], 'exist', 'skipOnError' => true, 'targetClass' => WorkingActivity::class, 'targetAttribute' => ['t_wa' => 'wa_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'Translator ID',
            't_name' => 'Translator Name',
//            't_wa' => 'T Wa',
            'type_wa' => 'Days of Working Activity',
//            'wa_name1' => 'Type of Working Activity',
        ];
    }

    /**
     * Gets query for [[TWa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeWa()
    {
        return $this->hasOne(WorkingActivity::class, ['wa_id' => 't_wa']);
    }
}
