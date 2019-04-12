<?php

use yii\db\Schema;

class m190412_040101_create_lesson_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('lesson', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45),
            'number' => $this->string(10),
            'description' => $this->string(245),
            'course_id' => $this->integer(11)->notNull(),
            'content' => $this->text(),
            'FOREIGN KEY ([[course_id]]) REFERENCES course ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('lesson');
    }
}
