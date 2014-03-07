<?php

class CustomersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $tablename = "Customer";

	public function index()
	{
		$customers = Customer::all()->toArray();
		if($customers)
		{
			return Response::json($customers,200);
		} else
		{
			return Response::json(["response" => "No Matching {$this->tablename} Found"],404);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Response::json(['response' => 'Not implemented'], 300);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$customer = Customer::create($input);
		if ( $customer )
		{
			return Response::json(['response' => "{$this->tablename} Created Successfully"],201);
		}
		else
		{
			return Response::json(['response' => "Unable to create {$this->tablename}"],300);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$customer = Customer::find($id);
		if ( $customer )
		{
			return Response::json($customer->toArray());
		}
		else
		{
			return Response::json(['response' => "Unable to locate {$this->tablename}"], 404);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer = Customer::find($id);
		if ( $customer )
		{
			return Response::json($customer->toArray(), 200);
		} else
		{
			return Response::json(['response' => "Unable to locate {$this->tablename}"],404);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$customer = Customer::find($id);
		$input    = Input::all();

		if(! $customer)
		{
			return Response::json(["response" => "Unable to locate {$this->tablename}"], 404);
		}
		else
		{
			$affectedRows = Customer::where('id', $id)->update($input);
			if($affectedRows)
			{
				return Response::json(Customer::find($id)->toArray(),200);
			}
			else
			{
				return Response::json(["response" => "An error occurred updating {$this->tablename}"], 500);
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if ( Customer::destroy($id) )
		{
			return Response::json(['response' => "{$this->tablename} Deleted Successfully"],200);
		}
		else
		{
			return Response::json(['response' => "Unable to locate {$this->tablename}"],404);
		}
	}

}