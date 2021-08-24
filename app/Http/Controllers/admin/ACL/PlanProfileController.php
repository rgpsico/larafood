<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    
    protected $plan , $profile;


    public function __construct(plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
        
    }

    public function profiles($idplan)
    {
      
        
        if(!$plan = $this->plan->find($idplan)){
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', compact('plan', 'profiles'));
        
    }

    public function profilesAvailable(Request $request , $idplan)
    {
        
        if(!$plan = $this->plan->find($idplan)){
            return redirect()->back();
        }
        
        $filters = $request->except('_token');
      

        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available',compact('plan','profiles','filters'));   

    }

    
    public function attachProfilesPlan(Request $request , $idplan)
    {             
        if(!$plan = $this->plan->find($idplan)){
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()
            ->back()
            ->with('info','Precisa escolher pelo menos uma Plano');
        }

        $plan->profiles()->attach($request->profiles);
        return redirect()->route('plans.profiles',$idplan);
      }
    
      public function detachPlanoProfile($idplan , $idprofile)
      {             
          if(!$plan = $this->plan->find($idplan)){
              return redirect()->back();
          }

          if(!$profile = $this->profile->find($idprofile)){
            return redirect()->back();
        } 
        
          $plan->profiles()->detach($profile);
           return redirect()->route('plans.profiles',$plan->id);
        }



        public function plans($idprofile)      {             
      
          if(!$profile = $this->profile->find($idprofile)){
            return redirect()->back();
        } 
        
          $plans = $profile->plans()->paginate();
           return  view('admin.pages.profiles.plans.plans' ,compact('profile','plans'));
        }
}
