<?php

use yii\db\Schema;

class m190412_020101_news_table_create extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'visibility' => $this->tinyint(1)->notNull(),
            'date' => $this->date(),
            'header' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            ], $tableOptions);
                
    }

    public function down()
    {
        $this->dropTable('news');
    }
}
