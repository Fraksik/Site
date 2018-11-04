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
}