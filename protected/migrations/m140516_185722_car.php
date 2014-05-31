<?php

class m140516_185722_car extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('{{car}}',array(
            'id' => 'pk',
            'name' => 'TEXT',
            'description' => 'TEXT',
            'image' => 'VARCHAR(256)',
            'text' => 'TEXT',
            'fuel_type' => 'INT(11)',
            'year_start' => 'DATE',
            'year_end' => 'DATE',
        ),'ENGINE=InnoDB');
	}

	public function down()
	{
		echo "m140516_185722_model does not support migration down.\n";
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