<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "working_activity".
 *
 * @property int $wa_id
 * @property string|null $wa_name
 *
 * @property Translators[] $translators
 */
class WorkingActivity extends \yii\db\ActiveRecord
{
    private static array $workingDay=[1,2,3,4,5];
    private static array $weekendDay=[6,7];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'working_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wa_name'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'wa_id' => 'Wa ID',
            'wa_name' => 'Wa Name',
        ];
    }

    /**
     * Gets query for [[Translators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTranslators()
    {
        return $this->hasMany(Translators::class, ['t_wa' => 'wa_id']);
    }
    public static function getWorkingDay(){
        return static::$workingDay;
    }
    public static function getWeekendDay(){
        return static::$weekendDay;
    }
}
