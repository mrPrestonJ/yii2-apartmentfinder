<?php

use yii\db\Migration;

/**
 * Class m190327_211740_insert_apartments
 */
class m190327_211740_insert_apartments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    { $this->batchInsert('{{%apartment}}',
        [
            'new_building_id',
            'section_id',
            'room_count',
            'total_area',
            'cost_per_meter',
            'cost_total',
            'is_typical'
        ],
        [
            [ 1 , null ,'1к', 62, 15000, 930000, 1],
            [ 1 , null ,'2к', 80, 14000, 1120000, 1],
            [ 1 , 2 ,'1к', 58, 15000, 870000, 0],
            [ 1 , null ,'3к', 90, 15000, 1350000, 1],
            [ 1 , null ,'4к', 110, 15000, 1650000, 1],
            [ 1 , null ,'5к', 150, 13000, 1950000, 1],
            [ 2 , 4 ,'1к', 42, 10000, 420000, 0],
            [ 2 , null ,'1к', 50, 11000, 550000, 1],
            [ 3 , null ,'1к', 40, 11000, 440000, 1],
            [ 3 , 5 ,'1к', 50, 11000, 550000, 0],
        ]
    );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%apartment}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190327_211740_insert_apartments cannot be reverted.\n";

        return false;
    }
    */
}
