<?php

namespace App\Libs;

use App\Models\Meja;

Class MejaData {
	
	public static function all_meja()
	{
		return Meja::all();
	}
}