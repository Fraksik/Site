<?php

namespace fraksik\models\repositories;

use fraksik\base\Main;

abstract class Repository
{
	protected $db;

	public function __construct()
	{
		$this->db = Main::call()->db;
	}

	public function save($entity)
	{
		if (is_null($entity->id)) {
			return $this->create($entity);
		} else {
			return $this->update($entity);
		}
	}

	public function create($entity)
	{

		$table = $this->getTableName();
		$arr = $this->getValues($entity);
		$columns = $arr['columns'];
		$params = $arr['params'];
		$values = $arr['values'];

		$sql = "insert into {$table}($columns) values($params)";

		$this->db->execute($sql, $values);
		$entity->id = $this->db->getLastId();
	}

	public function getOne($id)
	{
		$table = $this->getTableName();
		$sql = "SELECT * FROM {$table} WHERE id = :id";

		return $this->db->queryOneAsObj($sql, $this->getEntityClass(), [':id' => $id]);
	}

	public function getAll()
	{
		$table = $this->getTableName();
		$sql = "SELECT * FROM {$table}";
		return $this->db->queryAllAsObj($sql, $this->getEntityClass(), []);
	}

	public function update($entity)
	{
		$table = $this->getTableName();
		$arr = $this->getValues($entity);
		$values = $arr['values'];
		$change = $this->getOneArr($entity->id);

		$sql = "update {$table} set ";
		$sqlArr = [];

		foreach ($entity as $key => $data) {
			if($change[$key] != $data) {
				$sqlArr[] = "$key = '$data'";
			}
		}

		$sql .= implode(", ", $sqlArr) . " where id = {$entity->id}";

		$this->db->execute($sql, $values);
	}

	public function delete($entity)
	{
		$table = $this->getTableName();
		$sql = "delete from {$table} where id = :id";

		$this->db->execute($sql, [':id' => $entity->id]);
	}

	protected function getValues($entity)
	{
		$tableCols = $this->getColumns();

		$arr = [];
		$columns = [];
		$params = [];
		$values = [];

		foreach($entity as $key => $value) {
			if (in_array($key, $tableCols))
			{
				$columns[] = $key;
				$params[] = ":$key";
				$values[$key] = $value;
			}
		}

		$columns = implode(", ", $columns);
		$params = implode(", ", $params);

		$arr['columns'] = $columns;
		$arr['params'] = $params;
		$arr['values'] = $values;

		return $arr;
	}

	private function getColumns() {
		$table = $this->getTableName();
		$sql = "show columns from {$table}";
		$res = $this->db->queryAll($sql, []);
		$arr = [];
		foreach ($res as $col) {
			$arr[] = $col['Field'];
		}
		return $arr;
	}

	public function getOneArr($id) {
		$table = $this->getTableName();
		$sql = "SELECT * FROM {$table} WHERE id = :id";

		return $this->db->queryOne($sql, [':id' => $id]);
	}

}