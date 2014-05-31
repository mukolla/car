<?php

class m140516_185705_part extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('{{category}}',array(
            'id' => 'pk',
            'name' => 'TEXT',
            'description' => 'TEXT',
            'image' => 'VARCHAR(256)',
        ),'ENGINE=InnoDB');

        $this->createTable('{{part}}',array(
            'id' => 'pk',
            'category_id' => 'INT(11) NOT NULL',
            'name' => 'TEXT',
            'description' => 'TEXT',
            'text' => 'TEXT',
            'image' => 'VARCHAR(256)',
            'price' => 'VARCHAR(32)',
            'is_active' => 'TINYINT(1) UNSIGNED NOT NULL DEFAULT 1',
            'is_deleted' => 'TINYINT(1) UNSIGNED NOT NULL DEFAULT 0',
        ),'ENGINE=InnoDB');

        $this->addForeignKey('{{fk_category}}','{{part}}','category_id','{{category}}','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m140516_185705_part does not support migration down.\n";
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