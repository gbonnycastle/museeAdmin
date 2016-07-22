<?php
use Phinx\Migration\AbstractMigration;
class Initial extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('parties');
        $table
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('org', 'boolean', [
                'default' => false,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
        $this->execute(
            "INSERT INTO `parties` VALUES " .
            "('1', 'BonnycastleGeoffrey', false, '2016-07-17 15:56:23', null)," .
            "('2', 'LuJia', false, '2016-07-17 15:56:23', null)," .
            "('3', 'ShaoXiaohong', false, '2016-07-17 15:56:23', null)," .
            "('4', 'AliusCorp', true, '2016-07-17 15:56:23', null)," .
            "('5', 'TranscendanceProductionsInc', true, '2016-07-17 15:56:23', null)," .
            "('6', 'DuHaijun', false, '2016-07-17 15:56:23', null)," 
        );
    }
    public function down()
    {
        $this->dropTable('parties');
    }
}