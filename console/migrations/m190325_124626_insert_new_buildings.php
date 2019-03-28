<?php

use yii\db\Migration;

/**
 * Class m190325_124626_insert_new_buildings
 */
class m190325_124626_insert_new_buildings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%new_building}}', ['name', 'city_id'], [
            ['ЖК Сонячна Брама', 1],
            ['ЖК Echo Park', 2],
            ['ЖК Олимп',3],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%new_building}}');
    }
}
