<?php

use yii\db\Migration;

/**
 * Class m171128_060655_create_post
 */
class m171128_060655_create_post extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
			$this->createTable('post',[
				'id' => $this->primaryKey(),
				'title' => $this->string(),
				'description' => $this->text(),
				'user_id' => $this->integer(),
			]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171128_060655_create_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171128_060655_create_post cannot be reverted.\n";

        return false;
    }
    */
}
