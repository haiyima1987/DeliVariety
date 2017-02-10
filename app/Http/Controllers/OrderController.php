<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Http\Requests\OrderRequest;
use App\Menu;
use App\Order;
use App\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    // retrieve category count and menu items
    public function show_menu()
    {
        $categories = Category::all();
        $items = array();

        foreach ($categories as $category) {
            $items[$category->id] = Menu::where('category_id', $category->id)->get();
        }

//        $request->session()->flush();
        return view('pages.menu', compact('categories', 'items'));
    }

    public function add_item(Request $request, $id)
    {
        $item = Menu::find($id);
        $order_list = Session::has('order_list') ? Session::get('order_list') : new OrderList();
        $order_list->add_item($item, $id);
        $request->session()->put('order_list', $order_list);

//        $orderListHtml = view('partials.orderList', compact('order_list'))->render();
        $orderListHtml = view('ajax.orderedItems')->render();
        return $orderListHtml;
    }

    public function remove_item(Request $request, $id)
    {
        $item = Menu::find($id);
        $order_list = Session::get('order_list');
        $order_list->remove_item($item, $id);
        $request->session()->put('order_list', $order_list);
//        Session::put('order_list', $order_list);
//        return redirect()->route('order.menu');
//        $orderListHtml = view('partials.orderList', compact('order_list'))->render();
        $orderListHtml = view('ajax.orderedItems')->render();
//        dd($order_list);
//        $payBoxHtml = view('partials.payBox', compact('order_list'))->render();
//        return response()->json(array('success' => true, 'html' => $responseHtml));
//        $response = array('orderList' => $orderListHtml, 'payBox' => $payBoxHtml);
//        return $response;
        return $orderListHtml;
    }

    public function show_overview()
    {
//        $order_list = Session::get('order_list');
        $payBoxHtml = view('ajax.orderOverview')->render();
        return $payBoxHtml;
    }

    public function ship_orders()
    {
        return view('pages.order');
    }

    public function order_items(OrderRequest $request)
    {
        $customer = Customer::find($request->email);
        if ($customer) {
            $order_id = $this->addToOrders($customer->email, false);
            if ($order_id) {
                $ordered_items = Session::get('order_list')->items;
                $this->addToOrderAndPivot($order_id, $ordered_items);
                $address = $customer->address;
                Session::forget('order_list');
                return view('pages.orderSuccess', compact('ordered_items', 'order_id', 'address'));
            }
            return view('pages.order');
        } else {
            $customer = new Customer([
                'email' => $request->email,
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'address' => $request->address
            ]);
            $order_id = $this->addToOrders($customer->email, false);
            if ($order_id) {
                $ordered_items = Session::get('order_list')->items;
                $this->addToOrderMenus($order_id, $ordered_items);
                $address = $customer->address;
                Session::forget('order_list');
                return view('pages.orderSuccess', compact('ordered_items', 'order_id', 'address'));
            }
            return view('pages.order');
        }
    }

    public function user_order_items()
    {
        if (Session::has('email') && Session::has('order_list')) {
            $order_id = $this->addToOrders(Session::get('email'), true);
            if ($order_id) {
                $ordered_items = Session::get('order_list')->items;
                $this->addToOrderMenus($order_id, $ordered_items);
                $address = Session::get('address');
                Session::forget('order_list');
                return view('pages.orderSuccess', compact('ordered_items', 'order_id', 'address'));
            }
            return view('pages.menu');
        }
        return null;
    }

    /**
     * @param $email
     * @param $isDiscount
     * @return bool
     */
    private function addToOrders($email, $isDiscount)
    {
        $order = new Order([
            'order_id' => mt_rand(100000, 999999),
            'email' => $email,
            'discount' => $isDiscount
        ]);
        if ($order->save())
            return $order->order_id;
        return null;
    }

    /**
     * @param $order_id
     * @param $ordered_items
     * @internal param $customer
     */
    private function addToOrderMenus($order_id, $ordered_items)
    {
        foreach ($ordered_items as $item) {
            $new_order = Order::find($order_id);
            $new_order->Menus()->attach($item['item']['id'], ['quantity' => $item['qty']]);
        }
    }
}