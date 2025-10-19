<?php

namespace App\Models;

use App\DB\Database;

abstract class Model {
    
	protected $table;

	public function __construct() {
		if (!$this->table) {
			throw new \Exception('La propriété $table doit être définie dans le modèle enfant.');
		}
	}

    public function findById($id) {
        return $this->findBy("id", $id);
    }

	public function findBy($elemnt, $value) {
		$db = \App\DB\Database::getInstance();
		$sql = "SELECT * FROM {$this->table} WHERE {$elemnt} = ? LIMIT 1";
		$db->prepare($sql, [$value]);
		$result = $db->fetchAll();
		return $result ? $result[0] : null;
	}

	public function findAllBy($elemnt, $value) {
		$db = \App\DB\Database::getInstance();
		$sql = "SELECT * FROM {$this->table} WHERE {$elemnt} = ?";
		$db->prepare($sql, [$value]);
		$result = $db->fetchAll();
		return $result ? $result[0] : null;
	}

	public function findAll() {
		$db = \App\DB\Database::getInstance();
		$sql = "SELECT * FROM {$this->table}";
		$db->prepare($sql);
		return $db->fetchAll();
	}

	public function create($data) {
		$db = \App\DB\Database::getInstance();
		$fields = array_keys($data);
		$placeholders = implode(',', array_fill(0, count($fields), '?'));
		$sql = "INSERT INTO {$this->table} (" . implode(',', $fields) . ") VALUES ($placeholders)";
		$db->prepare($sql, array_values($data));
		return $db->getId();
	}

	public function update($id, $data) {
		$db = \App\DB\Database::getInstance();
		$fields = array_keys($data);
		$set = implode(', ', array_map(function($f) { return "$f = ?"; }, $fields));
		$sql = "UPDATE {$this->table} SET $set WHERE id = ?";
		$params = array_values($data);
		$params[] = $id;
		return $db->prepare($sql, $params);
	}

	public function delete($id) {
		$db = \App\DB\Database::getInstance();
		$sql = "DELETE FROM {$this->table} WHERE id = ?";
		return $db->prepare($sql, [$id]);
	}

    public function fetchALL() {
        $db = \App\DB\Database::getInstance();
        return $db->fetchAll();
    }

    public function rowCount() : int {
        $db = \App\DB\Database::getInstance();
        return $db->rowCount();
    }

    public function getId() {
        $db = \App\DB\Database::getInstance();
        return $db->getId();
    }

}

?>