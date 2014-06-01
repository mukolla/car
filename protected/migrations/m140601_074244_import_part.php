<?php

class m140601_074244_import_part extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{import_part}}',array(
            'id' => 'pk',
            'name' => 'TEXT',
            'description' => 'TEXT',
            'file' => 'VARCHAR(256)',
            'user_id' => 'INT(11) NOT NULL',
            'date_create' => 'DATETIME NOT NULL',
            'date_update' => 'DATETIME NOT NULL',
        ),'ENGINE=InnoDB');
	}

	public function down()
	{
		$this->dropTable('{{import_part}}');
        echo "m140601_074244_import_part does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}