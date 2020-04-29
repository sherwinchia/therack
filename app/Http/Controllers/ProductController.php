<?php

namespace App\Http\Controllers;

use App;
use App\Product;
use App\Stock;
use App\Cart;
use Illuminate\Http\Request;
use DB;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $genders = Product::select('gender')->groupBy('gender')->get();
        $brands = Product::select('brand')->groupBy('brand')->get();
        $categories = Product::select('category')->groupBy('category')->get();
        $maxPrice = Product::select('price')->max('price');
        $minPrice = Product::select('price')->min('price');
        return view('products.index',compact(['brands','genders','categories','maxPrice','minPrice','products']));
        
    }

    public function filter(Request $request)
    {
        if($request->ajax())
        {
            $products= Product::where('quantity','>',0);
            $query = json_decode($request->get('query'));
            $price = json_decode($request->get('price'));
            $gender = json_decode($request->get('gender'));
            $brand = json_decode($request->get('brand'));
            
            if(!empty($query))
            {
                $products= $products->where('name','like','%'.$query.'%');        
            }
            if(!empty($price))
            {
                $products= $products->where('price','<=',$price);
            }
            if(!empty($gender))
            {
                $products= $products->whereIn('gender',$gender);
            }   
            if(!empty($brand))
            {
                $products= $products->whereIn('brand',$brand);
            }
            $products=$products->get();
            

            $total_row = $products->count();
            if($total_row>0)
            {
                $output ='';
                foreach($products as $product)
                {
                    $output .='
                    <div class="col-lg-4 col-md-6 col-sm-12 pt-3">
                        <div class="card">
                            <a href="product/'.$product->id.'">
                                <div class="card-body ">
                                    <div class="product-info">
                                    
                                    <div class="info-1"><img src="'.asset('/storage/'.$product->image).'" alt=""></div>
                                    <div class="info-4"><h5>'.$product->brand.'</h5></div>
                                    <div class="info-2"><h4>'.$product->name.'</h4></div>
                                    <div class="info-3"><h5>RM '.$product->price.'</h5></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                    ';
                }
            }
            else
            {
                $output='
                <div class="col-lg-4 col-md-6 col-sm-6 pt-3">
                    <h4>No Data Found</h4>
                </div>
                ';
            }
            $data = array(
                'table_data'    =>$output
            );
            echo json_encode($data);
        
        }
    }

    public function show(Product $product)
    {   
        $sizes = Stock::where('product_id','=',$product->id)
                     ->get([
                            'name',
                            'quantity',
                        ]);

        return view('products.show', compact ('product','sizes'));
    }

    public function form()
    {
        return view('admin.addproduct');
    }

    public function create(Request $request)
    {
        $this->validate(request(),[
            'image'=>'required|image',
            'name'=>'required|string',
            'brand'=>'required|in:Nike,Adidas,New Balance,Asics,Puma,Skechers,Fila,Bata,Burberry,Converse',
            'price'=>'required|integer',
            'gender'=>'required|in:Male,Female,Unisex',
            'category'=>'required|in:Shoes',
        ]);

        $imagepath = $request->image->store('products','public');
        
        $product = new Product();
        $product->name=request('name');
        $product->brand=request('brand');
        $product->price=request('price');
        $product->gender=request('gender');
        $product->category=request('category');
        $product->image=$imagepath;

        

        $product->save();
        // DB:: table('products')->insert($product);
        return redirect()->route('admin.product')->with('success','Successfully added the product!');
    }
    
    public function editform($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.editproduct',compact('product'));
    }

    public function edit(Request $request,$id)
    {
        $this->validate(request(),[
            'image'=>'',
            'name'=>'required|string',
            'brand'=>'required|in:Nike,Adidas,New Balance,Asics,Puma,Skechers,Fila,Bata,Burberry,Converse',
            'price'=>'required|integer',
            'gender'=>'required|in:Male,Female,Unisex',
            'category'=>'required|in:Shoes',
        ]);
        if(request('image'))
        {
            $imagepath = $request->image->store('products','public');
            $product = Product::findOrFail($id);
            
            $product->name=request('name');
            $product->brand=request('brand');
            $product->price=request('price');
            $product->gender=request('gender');
            $product->category=request('category');
            $product->image=$imagepath;
            $product->save();
        }
        else
        {
            $product = Product::findOrFail($id);
            $product->name=request('name');
            $product->brand=request('brand');
            $product->price=request('price');
            $product->gender=request('gender');
            $product->category=request('category');
            $product->save();
        }
        return redirect()->route('admin.product')->with('success','Successfully edited the product!');
        
    }
    
    public function remove($id)
    {
        Product::where('id',$id)->delete();
        Stock::where('product_id',$id)->delete();

        return redirect()->route('admin.product')->with('success','Successfully removed the product!');
    }

    public function list()
    {
        $products = Product::orderBy('id')->get();
        //dd($products);
        return view('admin.product', compact ('products'));
    }


}