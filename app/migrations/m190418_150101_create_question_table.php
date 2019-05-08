<?php

use yii\db\Schema;

class m190418_150101_create_question_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('question', [
            'idquestion' => $this->primaryKey(),
            'question' => $this->string(255),
            'date_add' => $this->datetime(),
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('question');
    }
}
