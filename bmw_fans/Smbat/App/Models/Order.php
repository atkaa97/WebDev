<?php

namespace App\Models;

class Order extends \Core\ORMBase
{
	public $table = 'orders';

	public function getCustomer()
	{
		return (new \App\Models\Customer())->where('id = ' . $this->customer_id)->first();
	}

	public function getProduct()
	{
		return (new \App\Models\Product())->where('id = ' . $this->product_id)->first();
	}
}