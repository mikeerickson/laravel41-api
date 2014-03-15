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

    public function parse($fields)
    {
		$parsed = [];
        $items = $this->splitFieldsIntoChunks($fields);
		foreach($items as $item) {
			$parsed = $this->parseChunks($item, $parsed);
		}

		return $parsed;
    }

	/**
	 * @param $fields
	 * @return array
	 */
	public function splitFieldsIntoChunks($fields)
	{
		return preg_split('/, ?/', $fields);
	}

	/**
	 * @param $item
	 * @param $parsed
	 * @return mixed
	 */
	public function parseChunks($item, $parsed)
	{
		list($field, $type) = explode(':', $item);
		$parsed[$field] = $type;
		return $parsed;
	}
}
