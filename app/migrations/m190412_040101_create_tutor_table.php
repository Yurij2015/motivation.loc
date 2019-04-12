<?php

use yii\db\Schema;

class m190412_040101_create_tutor_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('tutor', [
            'id' => $this->primaryKey(),
            'name' => $this->string(245),
            'description' => $this->string(45),
            'phone' => $this->string(15),
            'adders' => $this->string(245),
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('tutor');
    }
}
