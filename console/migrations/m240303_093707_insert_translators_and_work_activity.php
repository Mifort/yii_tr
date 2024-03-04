<?php

use yii\db\Migration;

/**
 * Class m240303_093707_insert_translators_and_work_activity
 */
class m240303_093707_insert_translators_and_work_activity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('working_activity',
            ['wa_name'],
            [['work_day'],['weekend']]
        );
        $this->batchInsert('translators',
            ['t_name', 't_wa'],
            [['Иванов И.И.',1],['Петров П.П.',2]],
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('translators', ['t_name' => 'Иванов И.И.']);
        $this->delete('translators', ['t_name' => 'Петров П.П.']);
        $this->delete('working_activity', ['wa_name' => 'work_day']);
        $this->delete('working_activity', ['wa_name' => 'weekend']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240303_093707_insert_translators_and_work_activity cannot be reverted.\n";

        return false;
    }
    */
}
