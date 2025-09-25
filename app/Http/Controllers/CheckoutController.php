<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

use App\Mail\NewOrderMail;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display the checkout form.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        // If the cart is empty, redirect back.
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Dein Warenkorb ist leer!');
        }

        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return view('checkout.index', compact('cart', 'total'));
    }

    /**
     * Process the order.
     */

    public function process(Request $request)
    {
        // $user = auth()->user();

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Warenkorb ist leer!');
        }

        DB::beginTransaction();

        try {
            $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

            // Create the order record.
            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => $total,
                'status' => 'pending'
            ]);

            foreach ($cart as $id => $details) {
                // Find the full product model to get its category_id.
                $product = \App\Models\Product::find($id);

                // Add an 'if' statement to prevent an error if the product is not found.
                if ($product) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $id,
                        'category_id' => $product->category_id,
                        'quantity' => $details['quantity'],
                        'price' => $details['price'],
                    ]);
                }
            }

            session()->forget('cart');


            DB::commit();
            // Find the administrator's email in the database
            $admin = \App\Models\User::where('is_admin', 1)->first();

            // Check if an admin was found before sending the email
            if ($admin) {
                Mail::to($admin->email)->send(new NewOrderMail($order));
            }

            return redirect()->route('checkout.success')->with('success', 'Deine Bestellung wurde aufgegeben');
        } catch (\Exception $e) {
            DB::rollBack();
            // return redirect()->back()->with('error', 'Es gab einen Fehler bei der Bestellung');
            return redirect()->back()->with('error', 'Fehler: ' . $e->getMessage());

            // dd($e->getMessage());
        }
    }

    /**
     * Display the order confirmation page.
     */
    public function success()
    {
        return view('checkout.success');
    }
}
