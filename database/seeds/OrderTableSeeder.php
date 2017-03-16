<?php

use KingDelivery\Models\Order;
use KingDelivery\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 10)->create()->each(function ($order) {
            for ($i = 0; $i < 3; $i++) {
                $order->items()->save(factory(OrderItem::class)->make());
            }
        });
    }
}
