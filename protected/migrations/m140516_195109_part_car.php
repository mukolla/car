<?php

class m140516_195109_part_car extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable('{{part_car}}',array(
            'part_id' => 'INT(11) NOT NULL',
            'car_id' => 'INT(11) NOT NULL',
        ));

        $this->addForeignKey('{{fk_pm_1}}','{{part_car}}','part_id','{{part}}','id','CASCADE','CASCADE');
        $this->addForeignKey('{{fk_pm_2}}','{{part_car}}','car_id','{{car}}','id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m140516_195109_part_model does not support migration down.\n";
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