<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Category;

use App\Models\Contract;
use App\Models\UserCompany;
use App\Models\UserRequest;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ContractMedia;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contracts=Contract::when($request->query('type'),function($q)use($request){
            $q->where('user_type',$request->type);
        })->paginate(15);

        return view('backend.contract.list',compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $customers=User::whereHas('roles',function($q){
            $q->where('name','customer');
        })->get();
        
        $vendors=User::whereHas('roles',function($q){
            $q->where('name','vendor');
        })->get();

        $salesperson=User::whereHas('roles',function($q){
            $q->where('name','employee');
        })->get();

        $categories=Category::where('category_type','product')->get();
        return view('backend.contract.create',compact('customers','salesperson','vendors','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            "user_type" => ['required', 'in:customer,vendor'],
            "customer" => ['required', 'exists:users,id'],
            "vendor" => ['required', 'exists:users,id'],
            "start_date" => ['required', 'date'],
            "end_date" => ['required', 'date'],
            "renewal_date" => ['required', 'date'],
            "renewal_deadline_date" => ['required', 'date'],
            "contract_value" =>['required', 'integer'],
            "contract_file" => ['required', 'array'],
            "contract_file.*" => ['required', 'mimes:pdf']
        ];

        if ($request->user_type=='customer') {
            $rules = array_merge($rules, [
                "contract_type" => ['required', 'string'],
                "extension" => ['required', 'in:automatic'],
                "extension_period" => ['required', 'string'],
                "performance_delivery_degree" => ['required', 'string'],
                "performance_delivery_time" => ['required', 'string'],
                "performance_quality" => ['required', 'string'],
                "element_delivery_degree" => ['required', 'string'],
                "element_delivery_time" => ['required', 'string'],
                "element_quality" => ['required', 'string'],
                "delivery_instructions" => ['required', 'string'],
                "product_category" => ['required', 'integer'],
                "status_meeting" => ['required', 'string'],
                "meeting_date" => ['required', 'date']
            ]);
        }
        
        $validator = Validator::make($request->all(),$rules);
        
        if ($validator->fails()) {
            // dd(222);
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error','validation error');
        }
        // dd($request->all());
        $contract = new Contract;
        $contract->order_id = uniqid();
        $contract->user_type = $request->user_type;
        $contract->customer_id = $request->customer;
        $contract->vendor_id = $request->vendor;
        $contract->start_date = $request->start_date;
        $contract->end_date = $request->end_date;
        $contract->renewal_date = $request->renewal_date;
        $contract->renewal_deadline_date = $request->renewal_deadline_date;
        $contract->contract_value = $request->contract_value;

        if ($request->user_type=='customer') {
            $contract->contract_type = $request->contract_type;
            $contract->extension = $request->extension;
            $contract->extension_period = $request->extension_period;
            $contract->performance_delivery_degree = $request->performance_delivery_degree;
            $contract->performance_delivery_time = $request->performance_delivery_time;
            $contract->performance_quality = $request->performance_quality;
            $contract->element_delivery_degree = $request->element_delivery_degree;
            $contract->element_delivery_time = $request->element_delivery_time;
            $contract->element_quality = $request->element_quality;
            $contract->delivery_instructions = $request->delivery_instructions;
            $contract->product_category = $request->product_category;
            $contract->status_meeting = $request->status_meeting;
            $contract->meeting_date = $request->meeting_date;
        }

        $contract->save();

        if($request->hasFile('contract_file')) {
            if (is_array($request->contract_file)) {
                $files = $request->file('contract_file');
                foreach ($files as $file) {
                    
                    $contract_media=new ContractMedia;
                    $contract_media->contract_id = $contract->id;
                    $contract_media->file = custom_file_upload($file,CONTRACT_FILE_PATH);
                    $contract_media->save();
                }
            }else{
                $file = $request->file('contract_file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('contract_files', $filename);

                $contract_media=new ContractMedia;
                $contract_media->contract_id = $contract->id;
                $contract_media->file = $path;
                $contract_media->save();
            }
            
        }

        $contract->save();
        
        return redirect()->back()->with("success", "Contract has been Created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract=Contract::findOrFail($id);
        $customers=User::whereHas('roles',function($q){
            $q->where('name','customer');
        })->get();
        
        $vendors=User::whereHas('roles',function($q){
            $q->where('name','vendor');
        })->get();

        $salesperson=User::whereHas('roles',function($q){
            $q->where('name','employee');
        })->get();

        $categories=Category::where('category_type','product')->get();
        return view('backend.contract.create',compact('customers','salesperson','vendors','categories','contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $country_data=null;
        if (array_key_exists('phone',$request->all()) && $request->phone && $request->new_phone) {
            $country_data=json_decode($request->new_phone,true);
            if(!is_array($country_data)){
                return '';
            }
            $request->phone = str_replace(' ','','+'.' '.$country_data['dialCode'].$request->phone);
        }
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => ['required', 'string'],
            'email' => ['required', 'email','unique:users,email,'.$id],
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'password'  => 'string|nullable',
            'role' => 'string|in:vendor,customer,employee',
            'permissions' => ['required_if:role,==,employee','array'],
            'permissions.*' => ['string',function($attribute, $value, $fail) use ($request){
                $perm=Permission::where('name',$value)->first();
                if (!$perm) {
                    return $fail('Invalid permission');
                }
            }],
        ]);
        
        if ($validator->fails()) {
            // dd($request->all());
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $user =User::findOrFail($id);
        $user->fill($request->except(['_token','password','phone','phone_c_data']));
        $user->phone = $request->phone;
        $user->phone_c_data = $request->new_phone;

        if (!is_null($request->password)) {
            $user->password=Hash::make($request->password);
        }
        
        if($request->hasFile('profile_image')){

            $user->profile_image = custom_file_upload($request->profile_image,USER_IMAGE_PATH,$user->id);
        }

        $user->save();

        $user->roles()->detach();
        $user->assignRole($request->role);

        $user->permissions()->detach();
        //if permissions are set assign them to the user
        if ($request->role=='employee') {
            $user->givePermissionTo($request->permissions);
        }
        
        return redirect()->back()->with("status", "User has been Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract=Contract::findOrFail($id);
        $contract->delete();
        return redirect()->back();
    }

    public function impersonate($id)
    {
        $user=User::findOrFail($id);
        \Auth::user()->impersonate($user);

        return redirect()->back()->with("status", "User Impersonated.");
    }
}
