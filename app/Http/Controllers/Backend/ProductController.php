<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Procategory;
use App\Brand;
use App\Product;
use Storage;
use Image;
use Intervention\Image\ImageManager;
use App\Setting;
use DB;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::where('status', 1)->orderBy('id', 'ASC')->paginate(10);
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        
        return view('backend.product.index')->withProducts($products)->withShop($shop)->withCopy($copy);
    }

    public function barcode()
    {
        $barcode = Product::where('status', 1)->get();
        $shop = DB::table('settings')->pluck('shop_name'); 
        $copy = DB::table('settings')->pluck('copy');
        
        return view('backend.product.barcode')->withBarcode($barcode)->withShop($shop)->withCopy($copy);
    }

    
    public function create()
    {
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        $brand = Brand::all();
        $procategory = Procategory::all();

        return view('backend.product.create')->withProcategory($procategory)->withBrand($brand)->withShop($shop)->withCopy($copy);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'p_name' => 'required|max:255',
            'code' => 'required|unique:products,code',
            'bar_code' => '',
            'c_name' => '',
            'b_name' => '',
            'pur_price' => 'required',
            'cost' => '',
            'tax' => '',
            'discount' => '',
            'quantity' => '',
            'sale_price' => '',
            'image' => 'file|image|max:2048|min:50'
            ],[
            'p_name.required' => 'Product name will be required.',
            'code.unique' => 'Product code will be must unique.',
            'image.max' => 'The image maximum 2MB.',
            'image.min' => 'The image minimum 50KB.',
            ]);

        $images = $request->file('image');

        $filename = time().'.'.$images->getClientOriginalExtension();
        $location = public_path('/upload_file/resize_images/'. $filename);
        Image::make($images)->resize(600 , 600)->save($location);

        if($images)
        {
            $product = new Product;
            $status = 1;
            $product->name = $request->p_name;
            $product->code = $request->code;
            $product->bar_code = $request->bar_code;
            $product->procategory_id = $request->c_name;
            $product->brand_id = $request->b_name;
            $product->pur_price = $request->pur_price;
            $product->cost = $request->cost;
            $product->tax = $request->tax;
            $product->discount = $request->discount;
            $product->quantity = $request->quantity;
            $product->sale_price = $request->sale_price;
            $product->image = $filename;
            $product->status = $status;          
        }

        $product->save();

        return redirect()->route('products.index')->with('success' , 'Data have been successfully save.');

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $product = Product::find($id);

        $procategories = Procategory::all();

        $procat = array();
        foreach ($procategories as $procategory) {
            $procat[$procategory->id] = $procategory->name;
        }

        $brands = Brand::all();

        $bran = array();
        foreach ($brands as $brand) {
            $bran[$brand->id] = $brand->name;
        }
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');

        return view('backend.product.edit')->withProduct($product)->withProcategories($procat)->withBrands($bran)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'p_name' => 'max:255',
            'code' => '',
            'bar_code' => '',
            'c_name' => '',
            'b_name' => '',
            'pur_price' => '',
            'cost' => '',
            'tax' => '',
            'discount' => '',
            'quantity' => '',
            'sale_price' => '',
            'image' => ''

            ],[

            'code.unique' => 'Product code will be must unique.',
            'image.max' => 'The image maximum 2MB.',
            'image.min' => 'The image minimum 50KB.',
            ]);

        
            $images = $request->file('image');
            $product = Product::find($id);
                
            if($images != null) {              
                $filename = time().'.'.$images->getClientOriginalExtension();
                $location = public_path('/upload_file/resize_images/'. $filename);
                Image::make($images)->resize(600 , 600)->save($location);

                $oldFilename = $product->image;
                $product->image = $filename;
                Storage::delete($oldFilename);

            } else {
                $product->name = $request->p_name;
                $product->code = $request->code;
                $product->bar_code = $request->bar_code;
                $product->procategory_id = $request->procategory_id;
                $product->brand_id = $request->brand_id;
                $product->pur_price = $request->pur_price;
                $product->cost = $request->cost;
                $product->tax = $request->tax;
                $product->discount = $request->discount;
                $product->quantity = $request->quantity;
                $product->sale_price = $request->sale_price;
            }

            $product->save();
            return redirect()->route('products.index')->with(['success' => 'Data have been successfully updated !']);
    }

    
    public function destroy($id)
    {
        $product = Product::find($id); 
        $product->stocks()->delete();
        $product->sinvoices()->delete();
        $product->delete();

        return redirect()->route('products.index')->with('success' , 'Data have been successfully deleted.');
    }
}
