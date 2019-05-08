<?php

use yii\db\Schema;

class m190418_150101_create_motivationmeans_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('motivation_means', [
            'idmotivation_means' => $this->primaryKey(),
            'motivation_means_name' => $this->string(155),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('motivation_means');
    }
}
