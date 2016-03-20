<?php

namespace Bolt\Extension\AuthorName\Stencil\Storage\Schema\Table;

use Bolt\Storage\Database\Schema\Table\BaseTable;

/**
 * Stencil table.
 *
 * @author Your Name <you@example.com>
 */
class Stencil extends BaseTable
{
    /**
     * {@inheritdoc}
     */
    protected function addColumns()
    {
        $this->table->addColumn('id',      'integer',    ['autoincrement' => true]);
        $this->table->addColumn('stencil', 'string',     ['notnull' => false]);
    }

    /**
     * {@inheritdoc}
     */
    protected function addIndexes()
    {
        $this->table->addIndex(['stencil']);
    }

    /**
     * {@inheritdoc}
     */
    protected function setPrimaryKey()
    {
        $this->table->setPrimaryKey(['id']);
    }
}
