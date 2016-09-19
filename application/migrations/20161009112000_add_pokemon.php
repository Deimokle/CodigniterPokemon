<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_pokemon extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nom' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'photo' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'dte' => array(
                'type' => 'DATETIME',
            ),
            'cat' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'vie' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'combat' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),
            'exp' => array(
                'type' => 'INT',
                'constraint' => 11,
            ),

        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('pokemon');
    }

    public function down()
    {
        $this->dbforge->drop_table('pokemon');
    }
}