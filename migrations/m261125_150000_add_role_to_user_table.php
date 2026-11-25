<?php

use yii\db\Migration;

class m261125_150000_add_role_to_user_table extends Migration
{
    public function safeUp()
    {
        $tableName = $this->db->schema->getRawTableName('{{%user}}');
        $table = $this->db->schema->getTableSchema($tableName, true);
        if ($table === null) {
            throw new \RuntimeException('Không tìm thấy bảng user để thêm cột role.');
        }

        if (!isset($table->columns['role'])) {
            $this->addColumn('{{%user}}', 'role', $this->string(32)->notNull()->defaultValue('staff'));
        }

        $this->update('{{%user}}', ['role' => 'admin'], ['username' => 'admin']);
    }

    public function safeDown()
    {
        $tableName = $this->db->schema->getRawTableName('{{%user}}');
        $table = $this->db->schema->getTableSchema($tableName, true);
        if ($table !== null && isset($table->columns['role'])) {
            $this->dropColumn('{{%user}}', 'role');
        }
    }
}