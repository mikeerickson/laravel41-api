<?php namespace API;

class Utilities {

	public static function capitalize($str){
		return strtoupper($str);
	}

    public function lowercase($str)
    {
        return strtolower($str);
    }

    public function titlecase($str)
    {
        return ucwords($str);
    }
}
