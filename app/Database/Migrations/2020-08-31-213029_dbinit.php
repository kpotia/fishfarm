<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dbinit extends Migration
{
	
	public function up()
	{
		//
		$forge = \Config\Database::forge();
		if ($forge->createDatabase('fishfarm2'))
			{
					echo 'Database created!';
			}
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
