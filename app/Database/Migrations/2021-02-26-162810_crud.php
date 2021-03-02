<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Crud extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'Pelanggan_ID'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'Pelanggan_Nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'Pelanggan_Alamat' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'Pelanggan_Telp'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'Pelanggan_PIC'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'Pelanggan_HP'      => [
				'type'           => 'INT',
				'constraint'     => 10
			],
			'Pelanggan_crated_Date' => [
				'type'           => 'DATETIME'
			],
			'Pelanggan_created_By' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'Pelanggan_Modified_Date' => [
				'type'           => 'DATETIME'
			],
			'Pelanggan_Modified_By' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'Harga_ID'      => [
				'type'           => 'INT',
				'constraint'     => 10
			],
		]);


		$this->forge->addKey('Pelanggan_ID', TRUE);

		$this->forge->createTable('pelanggan', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pelanggan');
	}
}
