<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m241015_070401_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey()->unique()->notNull()->Unsigned(),
            'category_id' => $this->integer()->notNull()->Unsigned(),
            'title' => $this->string(500)->notNull(),
            'excertp' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'img' => $this->string(500),
            'created_at' => $this->integer(),
            'keywords' => $this->string(500),
            'description' => $this->string(500),
        ]);

        $this->addForeignKey(
            'category_id',
            'post',
            'category_id',
            'category',
            'id',
        );


        for ($i = 1; $i < 101; $i++) {
            $category = \app\models\Category::find()->orderBy('RAND()')->one();
            $post = new \app\models\Post();
            $post->category_id = $category->id;
            $post->title = 'Title' . $i;
            $post->excertp = 'Excertp' . $i;
            $post->content = 'Content' . $i;
            $post->keywords = 'KeyWords' . $i;
            $post->description = 'Description' . $i;
            $post->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
