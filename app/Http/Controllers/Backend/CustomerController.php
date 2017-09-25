<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Customertype;
use Storage;
use Image;
use Intervention\Image\ImageManager;
use App\Setting;
use DB;

class CustomerController extends Controller
{
    
    public function index()
    {
        $customers = Customer::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');

        return view('backend.customer.index')->withCustomers($customers)->withShop($shop)->withCopy($copy);
    }

    
    public function create()
    {
        $type = Customertype::all();
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.customer.create')->withType($type)->withShop($shop)->withCopy($copy);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'type_name' => 'required',
            'name' => 'max:255',
            'shop_name' => 'max:255',
            'email' => 'unique:customers,email',
            'phone' => 'required|unique:customers,phone',
            'image' => 'file|required|max:8048|min:50'

            ],[

            'type_name.required' => 'Company type is mandatory',
            'email.unique' => 'Customer email id is unique, please new email !',
            'phone.unique' => 'Customer phone id is unique, please new phone !',
            'image.required' => ' The image field is required.',
            'image.max' => 'The image maximum 8MB.',
            'image.min' => 'The image minimum 50KB.',
            ]);

        $images = $request->file('image');

        $filename = time().'.'.$images->getClientOriginalExtension();
        $location = public_path('/upload_file/resize_images/'. $filename);
        Image::make($images)->resize(600 , 600)->save($location);


        if($images)
        {
            $customer = new Customer;
            
            $customer->type_id = $request->type_name;
            $customer->name = $request->name;
            $customer->shop_name = $request->shop_name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->image = $filename;
        
        }

        $customer->save();

        return redirect()->route('customers.index')->with(['success' => 'Data have been successfully save']);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $customer = Customer::find($id);
        $custypes = Customertype::all(); 
        $type = array();
        foreach ($custypes as $custype) {
            $type[$custype->id] = $custype->type_name;
        }
        $shop = DB::table('settings')->pluck('shop_name');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.customer.edit')->withCustomer($customer)->withCustypes($type)->withShop($shop)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type_name' => '',
            'name' => 'max:255',
            'shop_name' => 'max:255',
            'email' => '',
            'phone' => '',
            'image' => ''

            ],[

            'type_name.required' => 'Company type is mandatory',
            'email.unique' => 'Customer email id is unique, please new email !',
            'phone.unique' => 'Customer phone id is unique, please new phone !',
            'image.required' => ' The image field is required.',
            'image.max' => 'The image maximum 2MB.',
            'image.min' => 'The image minimum 50KB.',
            ]);

        
            $images = $request->file('image');
            $customer = Customer::find($id);
                
            if($images != null) {              
                $filename = time().'.'.$images->getClientOriginalExtension();
                $location = public_path('/upload_file/resize_images/'. $filename);
                Image::make($images)->resize(600 , 600)->save($location);

                $oldFilename = $customer->image;
                $customer->image = $filename;
                Storage::delete($oldFilename);

            } else {
                $customer->type_id = $request->type_name;
                $customer->name = $request->name;
                $customer->shop_name = $request->shop_name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
            }

            $customer -> save();
            return redirect() -> route('customers.index', $customer->id)->with(['success' => 'Data have been successfully updated !']);
    }

    
    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer->delete();

        return redirect()->route('customers.index')->with('success' , 'Data have been successfully deleted');
    }
}
