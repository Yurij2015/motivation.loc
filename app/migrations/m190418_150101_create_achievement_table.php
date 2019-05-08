<?php

use yii\db\Schema;

class m190418_150101_create_achievement_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('achievement', [
            'idachievement' => $this->primaryKey(),
            'name' => $this->string(45),
            'description' => $this->string(255),
            'date_add' => $this->datetime(),
            'date_up' => $this->datetime(),
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('achievement');
    }
}
