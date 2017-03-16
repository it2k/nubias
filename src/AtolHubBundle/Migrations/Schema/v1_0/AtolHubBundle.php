<?php

namespace AtolHubBundle\Migrations\Schema\v1_0;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class AtolHubBundle implements Migration
{
    /**
     * @param Schema   $schema
     * @param QueryBag $queries
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        /** Tables generation **/
        $this->createAtolHubTable($schema);
        $this->createAtolHubEventTable($schema);
        $this->createAtolHubGroupTable($schema);
        $this->createAtolHubsGroupsTable($schema);

        /** Foreign keys generation **/
        $this->addAtolHubEventForeignKeys($schema);
        $this->addAtolHubsGroupsForeignKeys($schema);
    }

    /**
     * @param Schema $schema
     */
    protected function createAtolHubTable(Schema $schema)
    {
        $table = $schema->createTable('atol_hub');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('name', 'string', ['length' => 255]);
        $table->addColumn('ip', 'string', ['length' => 255]);
        $table->addColumn('username', 'string', ['length' => 255]);
        $table->addColumn('password', 'string', ['length' => 255]);
        $table->addColumn('update_system_info_time', 'datetime', ['notnull' => false]);
        $table->addColumn('factory_number', 'string', ['notnull' => false, 'length' => 100]);
        $table->addColumn('last_update_time', 'string', ['notnull' => false, 'length' => 35]);
        $table->addColumn('last_check_update_time', 'string', ['notnull' => false, 'length' => 35]);
        $table->addColumn('need_update', 'boolean', ['notnull' => false]);
        $table->addColumn('utm_version', 'string', ['notnull' => false, 'length' => 255]);
        $table->addColumn('old_version', 'boolean', ['notnull' => false]);
        $table->addColumn('active', 'boolean', []);
        $table->addColumn('utm_delete_documents', 'boolean', ['notnull' => false]);
        $table->addColumn('errors_in_log', 'boolean', ['notnull' => false]);
        $table->addColumn('alive', 'boolean', ['notnull' => false]);
        $table->addColumn('rsa_cert_expire_day_count', 'integer', ['notnull' => false]);
        $table->addColumn('gost_cert_expire_day_count', 'integer', ['notnull' => false]);
        $table->addColumn('cert_expired', 'boolean', ['notnull' => false]);
        $table->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    protected function createAtolHubEventTable(Schema $schema)
    {
        $table = $schema->createTable('atol_hub_event');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('hub_id', 'integer', ['notnull' => false]);
        $table->addColumn('user_id', 'integer', ['notnull' => false]);
        $table->addColumn('time', 'datetime', []);
        $table->addColumn('message', 'text', []);
        $table->addColumn('state', 'string', ['notnull' => false, 'length' => 255]);
        $table->setPrimaryKey(['id']);
        $table->addIndex(['hub_id'], 'IDX_ED458DD56C786081', []);
        $table->addIndex(['user_id'], 'IDX_ED458DD5A76ED395', []);
    }

    /**
     * @param Schema $schema
     */
    protected function createAtolHubGroupTable(Schema $schema)
    {
        $table = $schema->createTable('atol_hub_group');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('name', 'string', ['length' => 255]);
        $table->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    protected function createAtolHubsGroupsTable(Schema $schema)
    {
        $table = $schema->createTable('atol_hubs_groups');
        $table->addColumn('atolhub_id', 'integer', []);
        $table->addColumn('atolhubgroup_id', 'integer', []);
        $table->setPrimaryKey(['atolhub_id', 'atolhubgroup_id']);
        $table->addIndex(['atolhub_id'], 'IDX_C95272F6E887C045', []);
        $table->addIndex(['atolhubgroup_id'], 'IDX_C95272F6C89A19FD', []);
    }

    /**
     * @param Schema $schema
     */
    protected function addAtolHubEventForeignKeys(Schema $schema)
    {
        $table = $schema->getTable('atol_hub_event');
        $table->addForeignKeyConstraint(
            $schema->getTable('atol_hub'),
            ['hub_id'],
            ['id'],
            ['onDelete' => null, 'onUpdate' => null]
        );
        $table->addForeignKeyConstraint(
            $schema->getTable('oro_user'),
            ['user_id'],
            ['id'],
            ['onDelete' => null, 'onUpdate' => null]
        );
    }

    /**
     * @param Schema $schema
     */
    protected function addAtolHubsGroupsForeignKeys(Schema $schema)
    {
        $table = $schema->getTable('atol_hubs_groups');
        $table->addForeignKeyConstraint(
            $schema->getTable('atol_hub_group'),
            ['atolhubgroup_id'],
            ['id'],
            ['onDelete' => 'CASCADE', 'onUpdate' => null]
        );
        $table->addForeignKeyConstraint(
            $schema->getTable('atol_hub'),
            ['atolhub_id'],
            ['id'],
            ['onDelete' => 'CASCADE', 'onUpdate' => null]
        );
    }
}
