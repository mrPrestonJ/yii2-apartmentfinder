<?php

use yii\db\Migration;

/**
 * Class m190325_130422_insert_sections
 */
class m190325_130422_insert_sections extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%section}}', ['name', 'address', 'new_building_id'], [
            ['3 очередь дом 1', 'ул. Ломоносова, 71е', 1],
            ['3 очередь дом 2', 'ул. Ломоносова, 71д', 1],
            ['3 очередь дом 3', 'ул. Ломоносова, 71з', 1],
            ['1 дом', 'ул. Большая Кольцевая, 9', 2],
            ['1 дом', 'ул. Соборная, 2к', 3],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
            $this->truncateTable('{{%section}}');
    }
}
