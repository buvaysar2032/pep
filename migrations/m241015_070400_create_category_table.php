<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m241015_070400_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey()->unique()->notNull()->Unsigned(),
            'title' => $this->string(500)->notNull(),
            'alias' => $this->string(500)->notNull(),
        ]);

        for ($i = 1; $i < 101; $i++) {
            $category = new \app\models\Category();
            $category->title = 'Title' . $i;
            $category->alias = 'Alias' . $i;
            $category->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
