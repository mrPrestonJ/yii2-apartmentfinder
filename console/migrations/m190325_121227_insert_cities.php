<?php

use yii\db\Migration;

/**
 * Class m190325_121227_insert_cities
 */
class m190325_121227_insert_cities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%city}}', ['name'], [
            ['Киев'],
            ['Петропавловская Борщаговка'],
            ['Ирпень'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%city}}', ['in', 'name', [
            'Киев',
            'Петропавловская Борщаговка',
            'Ирпень',
        ]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_121227_insert_cities cannot be reverted.\n";

        return false;
    }
    */
}
