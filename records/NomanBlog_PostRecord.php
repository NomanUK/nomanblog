<?php
namespace Craft;

/**
 * Post record.
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string $body
 * @property string $image
 * @property DateTime $date
 * @property string $author
 * @property int $categoryId
 *
 * @property NomanBlog_CategoryRecord $category
 *
 * @author    NomanGaming
 * @copyright Copyright (c) 2017, NomanGaming
 * @package   craft.plugins.nomanblog.records
 * @since     0.1
 */
class NomanBlog_PostRecord extends BaseRecord
{

    /**
     * @return string
     */
    public function getTableName()
    {
        return 'nomanblog_posts';
    }

    /**
     * @return array
     */
    public function defineRelations()
    {
        return [
            'category' => [
                static::BELONGS_TO,
                'NomanBlog_CategoryRecord',
                'onDelete' => self::SET_NULL,
            ]
        ];
    }

    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return [
            'id'                  => AttributeType::Number,
			'title'               => [
                AttributeType::String,
                'required' => true,
                'label' => 'Title',
            ],
			'alias'               => AttributeType::String,
            'body'                => [
                AttributeType::String,
                'required' => true,
                'label' => 'Body',
            ],
			'image'               => AttributeType::String,
			'date'                => AttributeType::DateTime,
			'author'              => AttributeType::String,
            'categoryId'          => AttributeType::Number,
        ];
    }
}
