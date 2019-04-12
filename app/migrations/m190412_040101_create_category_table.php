<?php

use yii\db\Schema;

class m190412_040101_create_category_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'categoryname' => $this->string(45),
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
