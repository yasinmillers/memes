<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'body', 'created_at', 'updated_at', 'created_by'], 'required'],
            [['body'], 'string'],
            [['created_at', 'updated_at', 'created_by'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    public function getCreatedBy()
    {

        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}