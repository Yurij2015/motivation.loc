<?php

use yii\db\Schema;

class m190412_040101_create_course_table extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('course', [
            'id' => $this->integer(11)->notNull(),
            'description' => $this->string(245),
            'tutor_id' => $this->integer(11),
            'PRIMARY KEY ([[id]])',
            'FOREIGN KEY ([[tutor_id]]) REFERENCES tutor ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('course');
    }
}
