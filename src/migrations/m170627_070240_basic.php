<?php

use app\components\CommonMigration;

/**
 * Class m170627_070240_basic
 */
class m170627_070240_basic extends CommonMigration
{
    private array $members = [
        [
            'name' => 'あずま',
            'addr' => 'osaka',
            'qty'  => 100,
        ],
        [
            'name' => 'うえだ',
            'addr' => 'osaka',
            'qty'  => 200,
        ],
        [
            'name' => 'かざま',
            'addr' => 'kyoto',
            'qty'  => 300,
        ],
        [
            'name' => 'いたや',
            'addr' => 'kobe',
            'qty'  => 400,
        ],
    ];

    /**
     * up
     */
    public function up()
    {
        // SESSION
        $this->createTable('sessions', [
            'id'     => $this->string(40) . ' NOT NULL PRIMARY KEY COMMENT "ID"',
            'expire' => $this->integer() . ' NOT NULL COMMENT "有効期限"',
            'data'   => $this->binary() . ' COMMENT "データ"',
        ]);

        // members
        $this->createTable('members', [
            'id'   => $this->primaryKey()->unsigned()->notNull()->comment('ID'),
            'name' => $this->string(36)->notNull()->comment('名前'),
            'addr' => $this->string(128)->notNull()->comment('住所'),
            'qty'  => $this->integer()->unsigned()->notNull()->comment('数量'),
        ]);

        foreach ($this->members as $member) {
            $this->insert('members', $member);
        }
    }

    /**
     *  down
     */
    public function down()
    {
        $this->dropTable('members');
        $this->dropTable('sessions');
    }
}
