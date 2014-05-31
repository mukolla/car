<?php

class m140516_190952_user extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('{{user}}',array(
            'id' => 'pk',
            'username' => 'VARCHAR(128)',
            'password' => 'VARCHAR(128)',
            'email' => 'VARCHAR(128)',
            'profile' => 'text',
        ));
	}

	public function down()
	{
		echo "m140516_190952_user does not support migration down.\n";
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