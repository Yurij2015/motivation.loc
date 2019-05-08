<?php

use yii\db\Schema;

class m190418_150101_create_questionaryeml_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('questionary_eml', [
            'idquestionary_eml' => $this->primaryKey(),
            'question_idquestion' => $this->integer(11)->notNull(),
            'achievement_idachievement' => $this->integer(11)->notNull(),
            'answertoquestion' => $this->string(45),
            'date_add' => $this->datetime(),
            'FOREIGN KEY ([[achievement_idachievement]]) REFERENCES achievement ([[idachievement]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[question_idquestion]]) REFERENCES question ([[idquestion]]) ON DELETE CASCADE ON UPDATE CASCADE',
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('questionary_eml');
    }
}
