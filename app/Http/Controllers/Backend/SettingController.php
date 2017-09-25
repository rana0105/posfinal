<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Image;
use Storage;
use DB;

class SettingController extends Controller
{
    
    public function index()
    {
        $settings = Setting::all();
       $shop = DB::table('settings')->pluck('shop_name');
       $logo = DB::table('settings')->pluck('logo');
       $copy = DB::table('settings')->pluck('copy');
        return view('backend.setting.index')->withSettings($settings)->withShop($shop)->withLogo($logo)->withCopy($copy);
    }

    
    public function create()
    {
        $shop = DB::table('settings')->pluck('shop_name');
        $logo = DB::table('settings')->pluck('logo');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.setting.create')->withShop($shop)->withLogo($logo)->withCopy($copy);
    }

    
    public function store(Request $request)
    {

        $this->validate($request, [
            'shop_name' => 'required|max:255',
            'curen' => 'required|max:255',
            'taxvat' => 'required|max:255',
            'copy' => 'required|max:255',
            'logo' => 'file|required|image|max:5200|min:50'

            ],[

            'shop_name.required' => 'Company name is mandatory',
            'logo.required' => ' The image field is required.',
            'logo.max' => 'The image maximum 5MB.',
            'logo.min' => 'The image minimum 50KB.',
            ]);

        $images = $request->file('logo');

        $filename = time().'.'.$images->getClientOriginalExtension();
        $location = public_path('/upload_file/resize_images/'. $filename);
        Image::make($images)->resize(600 , 600)->save($location);


        if($images)
        {
            $setting = new Setting;
            
            $setting->shop_name = $request->shop_name;
            $setting->curen = $request->curen;
            $setting->taxvat = $request->taxvat;
            $setting->copy = $request->copy;
            $setting->logo = $filename;
        
        }

        $setting->save();

        return redirect()->route('settings.index')->with(['success' => 'Data have been successfully save']);

    }

    
    public function show($id)
    {
        // $setting = Setting::find(1);
        // dd($setting);
        // return view('backend.setting.index')->withSett($setting);
    }

    
    public function edit($id)
    {
        $setting = Setting::find($id);
        $shop = DB::table('settings')->pluck('shop_name');
        $logo = DB::table('settings')->pluck('logo');
        $copy = DB::table('settings')->pluck('copy');
        return view('backend.setting.edit')->withSetting($setting)->withShop($shop)->withLogo($logo)->withCopy($copy);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'shop_name' => '',
            'curen' => '',
            'taxvat' => '',
            'copy' => '',
            'logo' => ''

            ],[

            'shop_name.required' => 'Company name is mandatory',
            // 'email.unique' => 'Supplier email id is unique, please new email !',
            // 'phone.unique' => 'Supplier phone id is unique, please new phone !',
            // 'p_image.required' => ' The image field is required.',
            'logo.max' => 'The image maximum 2MB.',
            'logo.min' => 'The image minimum 50KB.',
            ]);
       
         
            $images = $request->file('logo');
            $setting = Setting::find($id);
                
            if($images != null) {              
                $filename = time().'.'.$images->getClientOriginalExtension();
                $location = public_path('/upload_file/resize_images/'. $filename);
                Image::make($images)->resize(600 , 600)->save($location);

                $oldFilename = $setting->logo;
                $setting->logo = $filename;
                Storage::delete($oldFilename);

            } else {
                $setting->shop_name = $request->shop_name;
                $setting->curen = $request->curen;
                $setting->taxvat = $request->taxvat;
                $setting->copy = $request->copy;
            }

            $setting -> save();
            return redirect() -> route('settings.index', $setting->id)->with(['success' => 'Data have been successfully updated !']);    
    }

    
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        return redirect()->route('settings.index')->with(['success' => 'Data have been successfully deleted !']);
    }
}
