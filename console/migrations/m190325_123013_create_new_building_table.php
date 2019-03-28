<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%new_building}}`.
 */
class m190325_123013_create_new_building_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%new_building}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'city_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-new_building-city_id',
            '{{%new_building}}',
            'city_id'
        );

        $this->addForeignKey(
            'fk-new_building-city_id',
            '{{%new_building}}',
            'city_id',
            '{{%city}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-new_building-city_id',
            '{{%new_building}}'
        );

        $this->dropIndex(
            'idx-new_building-city_id',
            '{{%new_building}}'
        );

        $this->dropTable('{{%new_building}}');
    }
}
