<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
  	public function index() 
  	{
		$revenue=Order::where('payment_status','CONFIRMED')->sum('total_amount');
		$total_companies=CompanyProfile::get()->count();
		$orders=Order::where('payment_status','CONFIRMED')->count();
		$new_users=User::whereHas('roles',function($q){
			$q->whereIn('name',['endUser']);
		})->count();

		$top_services=OrderItem::has('order')->has('company')->has('service')->with('service.service_data')->get()->pluck('service')->unique();
		$recent_orders=Order::latest()->limit(10)->get();
		
		$graph=Order::select(
            DB::raw('sum(total_amount) as `revenue`'), 
            DB::raw("DATE_FORMAT(created_at,'%b %Y') as months")
  		)->where('payment_status','CONFIRMED')->groupBy('months')->get();
		// dd($graph->pluck('months')->toArray());
		$data=[
			'revenue'=>$revenue,
			'total_companies'=>$total_companies,
			'orders'=>$orders,
			'new_users'=>$new_users,
		];
		// dd($data);
	    return view('backend.index',compact('data','top_services','recent_orders','graph'));
  	}
	  
  	public function terms_and_condition(Request $request) 
  	{
		if(request()->isMethod('post')) {
			//validaitons
			$validator = Validator::make(request()->all(), [
				'title' => 'required',
				'description' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			//createOrUpdate
			$terms_and_condition=\App\Models\TermsCondition::first();
			$terms_and_condition->fill(request()->except('_token','files'));
			$terms_and_condition->save();
			//redirect
			return redirect()->back()->with('success','Terms and condition updated successfully');
		}else{
			$terms=\App\Models\TermsCondition::first();
			return view('backend.pages.terms_and_condition',compact('terms'));
		}
  	}

  	public function profile() 
  	{
	      return view('backend.profile.index');
  	}

  	public function publications() 
  	{
	      return view('backend.publications.index');
  	}

	public function search() 
	{
	return view('backend.search');
	}

}
