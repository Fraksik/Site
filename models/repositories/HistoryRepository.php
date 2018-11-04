<?php

namespace fraksik\models\repositories;

use fraksik\models\History;

class HistoryRepository extends Repository
{
	public function getTableName()
	{
		return 'history';
	}

	public function getEntityClass()
	{
		return History::class;
	}

	public function getAll()
	{
		$table = $this->getTableName();
		$sql = "SELECT * FROM {$table} ORDER BY id DESC";
		return $this->db->queryAllAsObj($sql, $this->getEntityClass(), []);
	}
}