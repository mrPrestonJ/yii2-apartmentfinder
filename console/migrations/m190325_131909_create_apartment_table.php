<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartment}}`.
 */
class m190325_131909_create_apartment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartment}}', [
            'id' => $this->primaryKey(),
            'new_building_id' => $this->integer(),
            'section_id' => $this->integer(),
            'room_count' =>  "ENUM('1к', '2к', '3к', '4к', '5к', '5к-двухуровневая', '6к-двухуровневая')  NOT NULL DEFAULT '1к'",
            'total_area' => $this->float()->notNull(),
            'cost_per_meter' => $this->float()->notNull(),
            'cost_total' => $this->float()->notNull(),
            'is_typical' => $this->boolean(),
        ]);

        $this->createIndex(
            'idx-apartment-new_building_id',
            '{{%apartment}}',
            'new_building_id'
        );

        $this->addForeignKey(
            'fk-apartment-new_building_id',
            '{{%apartment}}',
            'new_building_id',
            '{{%new_building}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-apartment-section_id',
            '{{%apartment}}',
            'section_id'
        );

        $this->addForeignKey(
            'fk-apartment-section_id',
            '{{%apartment}}',
            'section_id',
            '{{%section}}',
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
            'fk-apartment-new_building_id',
            '{{%apartment}}'
        );

        $this->dropIndex(
            'idx-apartment-new_building_id',
            '{{%apartment}}'
        );

        $this->dropForeignKey(
            'fk-apartment-section_id',
            '{{%apartment}}'
        );

        $this->dropIndex(
            'idx-apartment-section_id',
            '{{%apartment}}'
        );

        $this->dropTable('{{%apartment}}');
    }
}
