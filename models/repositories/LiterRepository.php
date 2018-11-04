<?php

namespace fraksik\models\repositories;

use fraksik\models\Liter;

class LiterRepository extends Repository
{
	public function getTableName()
	{
		return 'liter';
	}

	public function getEntityClass()
	{
		return Liter::class;
	}
}