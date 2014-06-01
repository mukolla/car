<?php

class m140601_084852_temp_import_part extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{temp_import_part}}',array(
            'id' => 'pk',
            'category_id' => 'INT(11) NOT NULL',
            'name' => 'TEXT',
            'description' => 'TEXT',
            'text' => 'TEXT',
            'image' => 'VARCHAR(256)',
            'price' => 'DECIMAL(8,2)',
            'is_active' => 'INT(11) DEFAULT 1',
            'is_deleted' => 'INT(11) DEFAULT 0',
            'car_list' => 'TEXT NULL',
        ),'ENGINE=InnoDB');
	}

	public function down()
	{
		echo "m140601_084852_temp_import_part does not support migration down.\n";
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