<?php

use yii\db\Schema;

class m190418_150101_create_motivationempl_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('motivation_empl', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'motivation_means_idmotivation_means' => $this->integer(11)->notNull(),
            'date_add' => $this->datetime(),
            'date_up' => $this->datetime(),
            'FOREIGN KEY ([[motivation_means_idmotivation_means]]) REFERENCES motivation_means ([[idmotivation_means]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[user_id]]) REFERENCES user ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('motivation_empl');
    }
}
