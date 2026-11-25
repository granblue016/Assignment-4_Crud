<?php

use yii\db\Migration;

class m261125_160500_fix_user_id_sequence extends Migration
{
    public function safeUp()
    {
        $table = $this->db->schema->getTableSchema(
            $this->db->schema->getRawTableName('{{%user}}'),
            true
        );
        if ($table === null || !isset($table->columns['id'])) {
            throw new \RuntimeException('Không tìm thấy bảng user hoặc cột id để sửa sequence.');
        }

        $schemaName = $table->schemaName ?: 'public';
        $qualifiedTable = $this->db->quoteTableName($schemaName . '.' . $table->name);
        $sequenceName = $schemaName . '.' . $table->name . '_id_seq';
        $sequence = $this->db->quoteTableName($sequenceName);
        $associatedSequence = $this->db->createCommand(
            'SELECT pg_get_serial_sequence(:tableName, :columnName)',
            [
                ':tableName' => $qualifiedTable,
                ':columnName' => 'id',
            ]
        )->queryScalar();

        if (!$associatedSequence) {
            $this->execute("CREATE SEQUENCE IF NOT EXISTS {$sequence}");
            $this->execute("ALTER SEQUENCE {$sequence} OWNED BY {$qualifiedTable}.\"id\"");
            $this->execute(
                "ALTER TABLE {$qualifiedTable} ALTER COLUMN \"id\" SET DEFAULT nextval("
                . $this->db->quoteValue($sequenceName) . '::regclass)'
            );
            $associatedSequence = $sequenceName;
        }

        $this->db->createCommand(
            'SELECT setval(CAST(:sequenceName AS regclass), '
            . 'COALESCE(MAX("id"), 1), COUNT(*) > 0) FROM ' . $qualifiedTable,
            [':sequenceName' => $associatedSequence]
        )->queryScalar();
    }
}
