<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::orderBy('code')->get();
        $category = Category::query()->get();
        return view('product.index', compact('products','category'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function precreate()
    {
        //
        {
            return view('transaction.precreate');
        }
    }

    public function create(Request $request)
    {
        //
        {
            $validated = $request->validate([
                'totalproduct' => 'required|numeric',
            ]);

            $products = Product::orderBy('name')->get();
            $num = $request->totalproduct;
            return view('transaction.create',compact('products','num') );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        do{
            $randomNumber = mt_rand(100000,999999);
            $checkCode = Transaction::where('code',$randomNumber)->first();
            } while ($checkCode);

        $transaction_code = $randomNumber;
        $products = $request->product_id;
        $items = $request->item;

        for ($i=0 ; $i<$id ; $i++) {
            $products[] = Transaction::create([
                'code' => $transaction_code,
                'product_id' => $products[$i],
                'item' => $items[$i],
            ]);
        }

        $transaction = Transaction::where('code',$transaction_code)->with('product')->get();

        return view('transaction.payment', compact('transaction', 'transaction_code'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id', $id)->with('category') -> get();

        return view('product.index', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        $category = Catgory::all();
        return view('product.index', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function payment(Request $request, $id)
    {
        //
        $transaction = Transaction::where('code',$id)->with('product')->get();
        $change = 0;
        if($request->payment == 'cash')
        {
            $change = $request->total - $request->paid;
            if ($request->total > 100000){
                $product = Product::where('price'< 15000)->where('stock' != 0)->first();
                return view('transaction.bonus', compact('product','change'));}
            return view('transaction.success', compact('change'));

        } else {
            if($request->total > 100000){
                $product = Product::where('price'< 15000)->where('stock' != 0)->first();
                return view('transaction.bonus', compact('product'));
            }
            return view('transaction.success', compact('change'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect('/');
    }
}
