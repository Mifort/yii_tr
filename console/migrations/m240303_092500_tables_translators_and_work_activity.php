<?php

use yii\db\Migration;

/**
 * Class m240303_092500_tables_translators_and_work_activity
 */
class m240303_092500_tables_translators_and_work_activity extends Migration
{
    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m240303_092500_tables_translators_and_work_activity cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('translators', [
            't_id' => $this->primaryKey(),
            't_name' => $this->string(150),
            't_wa' => $this->integer(),
//            't_first' => $this->dateTime(),
        ]);
        $this->createTable('working_activity', [
            'wa_id' => $this->primaryKey(),
            'wa_name' => $this->string(15),
        ]);
        $this->addForeignKey(
            'fk-translator-working_activity',
            'translators',
            't_wa',
            'working_activity',
            'wa_id',
            'SET NULL'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-translator-working_activity',
            'translators'
        );
        $this->dropTable('working_activity');
        $this->dropTable('translators');
    }

}
