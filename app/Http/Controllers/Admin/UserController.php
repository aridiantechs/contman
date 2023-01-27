<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Service;

use App\Models\Nationality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Domain\Mail\InviteTalent;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Domain\Mail\DeactivateUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users=User::whereHas('roles',function($q){
            $q->where('name','<>','superadmin');
        });

        $roles=(clone $users)->get();
        $users=$users->paginate(10);

        return view('backend.user.list',compact('roles','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users=User::whereHas('roles',function($q){
            $q->where('name','<>','superadmin');
        });

        $salesperson=User::salesperson()->get();
        $purchaser=User::purchaser()->get();

        $roles=(clone $users)->get();
        $permissions=Permission::all();
        return view('backend.user.create',compact('salesperson','purchaser','roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'profile_image'=>'nullable|image|max:5000',
            'role' => 'string|exists:roles,name',
            'salesperson' => ['required_if:role,==,customer','array'],
            'salesperson.*' => ['exists:users,id'],
            'purchaser' => ['required_if:role,==,vendor','array'],
            'purchaser.*' => ['exists:users,id'],
            'permissions' => ['required_if:role,==,employee','array'],
            'permissions.*' => ['string',function($attribute, $value, $fail) use ($request){
                $perm=Permission::where('name',$value)->first();
                if (!$perm) {
                    return $fail('Invalid permission');
                } 
            }],

        ]);
        
        if ($validator->fails()) {
            // dd(333);
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender ?? '',
            'designation' => $request->designation ?? '',
            'phone' =>$request->phone,
            'phone_c_data'=>$request->new_phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'association' => $request->role=='customer' ? implode('|',$request->salesperson) : ($request->role=='vendor' ? implode('|',$request->purchaser) :null)
        ]);

        if($request->hasFile('profile_image')){

            $user->profile_image = custom_file_upload($request->profile_image,USER_IMAGE_PATH,$user->id);
        }
        $user->save();

        $user->assignRole($request->role);

        //if permissions are set assign them to the user
        if ($request->role=='employee') {
            $user->givePermissionTo($request->permissions);
        }
        
        return redirect()->back()->with("success", "User has been Created.");
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
        $user= User::findOrFail($id);
        $roles=Role::where('name','<>','superadmin')->get();
        $permissions=Permission::all();

        $salesperson=User::salesperson()->get();
        $purchaser=User::purchaser()->get();
        return view('backend.user.create',compact('salesperson','purchaser','user','roles','permissions'));
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
            'role' => 'string|exists:roles,name',
            'salesperson' => ['required_if:role,==,customer','array'],
            'salesperson.*' => ['exists:users,id'],
            'purchaser' => ['required_if:role,==,vendor','array'],
            'purchaser.*' => ['exists:users,id'],
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
        $user->designation = $request->designation ?? '';
        $user->phone = $request->phone;
        $user->phone_c_data = $request->new_phone;
        $user->association = $request->role=='customer' ? implode('|',$request->salesperson) : ($request->role=='vendor' ? implode('|',$request->purchaser) :null);
        
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
        $user=User::findOrFail($id);
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();
        return redirect()->back();
    }

    public function impersonate($id)
    {
        $user=User::findOrFail($id);
        \Auth::user()->impersonate($user);

        return redirect()->back()->with("status", "User Impersonated.");
    }
}
