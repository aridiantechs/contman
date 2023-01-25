<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Contract;
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
		$revenue=Contract::sum('contract_value');
		$orders=Contract::count();

		$customers=User::whereHas('roles',function($q){
			$q->whereIn('name',['customer']);
		})->count();

		$vendors=User::whereHas('roles',function($q){
			$q->whereIn('name',['vendor']);
		})->count();

		$top_services=OrderItem::has('company')->has('service')->with('service.service_data')->get()->pluck('service')->unique();
		$recent_orders=Contract::latest()->limit(10)->get();
		
		$graph=Contract::select(
            DB::raw('sum(contract_value) as `revenue`'), 
            DB::raw("DATE_FORMAT(created_at,'%b %Y') as months")
  		)->groupBy('months')->get();
		// dd($graph->pluck('months')->toArray());
		$data=[
			'revenue'=>$revenue,
			'orders'=>$orders,
			'customers'=>$customers,
			'vendors'=>$vendors,
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
