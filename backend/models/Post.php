<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $post_id
 * @property string $title
 * @property string $description
 * @property integer $author_id
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'author_id'], 'required'],
            [['author_id'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'title' => 'Title',
            'description' => 'Description',
            'author_id' => 'Author ID',
        ];
    }
}
