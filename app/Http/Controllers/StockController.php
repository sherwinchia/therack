<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $product_id=Product::all();
        //dd($product_id);
        return view('admin.stock',compact('product_id'));
    }

    public function show(Request $request)
    {
        if($request->ajax())
        {
            $id = json_decode($request->get('id'));
            $stock = Stock:: where('product_id',$id);
           
            $stock=$stock->orderBy('name', 'ASC')->get();
            

            $total_row = $stock->count();
            if($total_row>0)
            {
                $output ='';
                foreach($stock as $stock)
                {
                    $output .='
                    <tr >

                    <th scope="row">
                        '.$stock->name.'
                    </th>
                    <td>
                        '.$stock->quantity.'
                    </td>
                    <td>
                          <a href="/admin-stock/edit/'.$stock->id.'" class="btn btn-primary  m-1" style="color:white; width:100px;">EDIT</a>
                          <a href="/admin-stock/remove/'.$stock->id.'" class="btn btn-danger  m-1" style="color:white; width:100px;">REMOVE</a>
                    </td>

                    </tr>
              
                    ';
                }
            }
            else
            {
                $output='
                <div class="col-lg-4 col-md-6 col-sm-6 pt-3">
                    <h4>No Size Found</h4>
                </div>
                ';
            }
            $data = array(
                'table_data'    =>$output
            );
            echo json_encode($data);
        
        }
    }

    public function addform()
    {
        $products = Product::all();
        return view('admin.addstock',compact('products'));
    }

    public function addstock()
    {
        $this->validate(request(),[
            'size'=>'required|string',
            'quantity'=>'required|integer',
        ]);

        $stock = new Stock();
        $stock->product_id=request('product');
        $stock->name=request('size');
        $stock->quantity=request('quantity');
        $stock->save();

        return redirect()->route('admin.stock')->with('success','Successfully added the product!');
    }

    public function editform($id)
    {
        $stock=Stock::findOrFail($id);
        return view('admin.editstock',compact('stock'));
    }

    public function editstock(Request $request, $id)
    {
        $this->validate(request(),[
            'size'=>'required|string',
            'quantity'=>'required|integer',
        ]);

        $stock=Stock::findOrFail($id);
        $stock->name=request('size');
        $stock->quantity=request('quantity');
        $stock->save();
        
        return redirect()->route('admin.stock')->with('success','Successfully edited the product!');
    }

    public function remove($id)
    {
        Stock::where('id','=',$id)->delete();

        return redirect()->route('admin.stock')->with('success','Successfully removed the product!');
    }


}