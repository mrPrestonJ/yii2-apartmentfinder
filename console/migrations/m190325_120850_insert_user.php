<?php

use yii\db\Migration;

/**
 * Class m190325_120850_insert_user
 */
class m190325_120850_insert_user extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->insert('{{%user}}',array(
            'email'=>'admin@some.com',
            'username' =>'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('password'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => time(),
            'updated_at' => time(),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['id' => 1]);
    }
}
