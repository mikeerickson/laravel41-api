<?php

class Customer extends \Eloquent {
    protected $fillable = ['customer_name','address','city', 'state', 'zip'];
	protected $hidden = ['id', 'created_at', 'updated_at'];
}