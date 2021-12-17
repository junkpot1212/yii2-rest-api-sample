<?php

namespace app\components;

use yii\db\Migration;

class CommonMigration extends Migration
{
    /**
     * @var null|string
     */
    protected $tableOptions = null;

    /**
     * init
     */
    public function init()
    {
        parent::init();
        if ($this->db->driverName === 'mysql') {
            $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
    }

    /**
     * テーブルが存在すればDROP TABLEする
     *
     * @param $tableName
     */
    protected function dropTableIfExists($tableName)
    {
        if ($this->db->schema->getTableSchema($tableName)) {
            $this->dropTable($tableName);
        }
    }

    /**
     * テーブル作成時にデフォルトのテーブルオプションを指定する
     *
     * @param string $table
     * @param array  $columns
     * @param null   $options
     */
    public function createTable($table, $columns, $options = null)
    {
        return parent::createTable($table, $columns, $options ?? $this->tableOptions ?? null);
    }
}
