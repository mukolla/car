<?php

class m140516_200054_image extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('{{image}}',array(
            'id' => 'pk',
            'part_id' => 'INT(11) NOT NULL',
            'description' => 'TEXT',
            'text' => 'TEXT',
            'image' => 'VARCHAR(256)',
        ));

        $this->addForeignKey('{{fk_image_for_part}}','{{image}}','part_id','{{part}}','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m140516_200054_image does not support migration down.\n";
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