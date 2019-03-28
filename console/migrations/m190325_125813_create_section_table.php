<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%section}}`.
 */
class m190325_125813_create_section_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%section}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'address' => $this->string(),
            'new_building_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-section-new_building_id',
            '{{%section}}',
            'new_building_id'
        );

        $this->addForeignKey(
            'fk-section-new_building_id',
            '{{%section}}',
            'new_building_id',
            '{{%new_building}}',
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
            'fk-section-new_building_id',
            '{{%section}}'
        );

        $this->dropIndex(
            'idx-section-new_building_id',
            '{{%section}}'
        );

        $this->dropTable('{{%section}}');
    }
}
