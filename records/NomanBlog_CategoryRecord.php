<?php
namespace Craft;

/**
 * Category record.
 *
 * @property int $id
 * @property string $name
 *
 * @author    NomanGaming
 * @copyright Copyright (c) 2017, NomanGaming
 * @package   craft.plugins.nomanblog.records
 * @since     0.1
 */
class NomanBlog_CategoryRecord extends BaseRecord
{

    /**
     * @return string
     */
    public function getTableName()
    {
        return 'nomanblog_categories';
    }

    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return [
            'id'                  => AttributeType::Number,
			'name'               => [
                AttributeType::String,
                'required' => true,
                'label' => 'Category name',
            ]
        ];
    }
}
