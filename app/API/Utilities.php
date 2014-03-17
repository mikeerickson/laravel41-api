<?php namespace API;

use API\Exceptions\UnrecognizedType;
use API\Exceptions\InvalidCustomer;

class Utilities {

	public function capitalize($str)
	{
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
		if (strpos($item,':')>0)
		{
			list($field, $type) = explode(':', $item);
		}
		else
		{
			$field = $item;
			$type  = "string";
		}
		if( ! $this->isValidType($type) )
		{
			throw new UnrecognizedType;
		}

		$parsed[$field] = $type;
		return $parsed;
	}

	/**
	 * @param $type
	 * @return bool
	 */
	public function isValidType($type)
	{
		$validTypes = ['string', 'text', 'integer', 'datetime', 'boolean'];
		return in_array($type, $validTypes);
	}

	public function getCustomer($id = null)
	{
		$customer = \Customer::find($id);
		if( ! $customer)
		{
			throw new InvalidCustomer;
		}

		return \Customer::find($id)->customer_name;

	}
}
