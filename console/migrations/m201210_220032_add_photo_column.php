<?php

use yii\db\Migration;

/**
 * Class m201210_220032_add_photo_column
 */
class m201210_220032_add_photo_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("student","photo", $this->string(250));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("student", "photo");
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201210_220032_add_photo_column cannot be reverted.\n";

        return false;
    }
    */
}
