<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Student;
use App\Models\User;
use App\Models\Classes;
use App\Models\Skill;
use App\Models\Company;
use App\Models\Taken;
use App\Models\Selection;
use App\Models\Requires;
use App\Models\Prerequisite;
use Hash;

class AuthController extends Controller {

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index() {
        return view('index');
    }

    public function login() {

        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration() {

        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->intended('dashboard')
                            ->withSuccess('You have successfully logged in');
        }

        return redirect("login")->withSuccess('You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request) {
        $request->validate([
            'ID' => 'required|unique:students',
            'Password' => 'required',
            'email' => 'required|unique:users',
            'First' => 'required',
            'Last' => 'required',
            'Major' => 'required',
            'Year' => 'required'
        ]);

        //$data = $request->all();
        $this->create($request);

        return redirect("login")->withSuccess('Great! You have successfully registered!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard() {
        if (Auth::guard('user')->check()) {
            $flag = false;
            $taken = Taken::select('*')->where('ID', Auth::guard('user')->user()->id);
            $class = Classes::all();
            $aval = array();
            $skill = Skill::all()->all();
            $userid = Company::select('ID')->where('Name', $this->company_name())->first();
            $requires = array();
            if (!is_null($userid)) {
				if (!is_null(Selection::select('*')->where('CompanyID', $userid->ID)->first())) {
					$requires = Requires::select('*')->where('CompanyID', $userid->ID)->get();
				}
            }
            $company = Company::select('*')->where('Responsibilities', '<>', 'Custom skills.')->orWhere('Name', $this->company_name())->get();
            $selection = Selection::select('*')->where('ID', Auth::guard('user')->user()->id);
            foreach ($class as $c) {
                foreach ($taken->get() as $t) {
                    if ($t["Class"] == $c["Class"]) {
                        $flag = true;
						break;
                    }
                }
				
                if (!$flag) {
                    array_push($aval, $c);
                }
                $flag = false;
            }
			
            // If a company has been selected i.e. selection is not null for their id, update dropdown menu of company to not have any values
            $compID = Selection::select('*')->where('ID', Auth::guard('user')->user()->id)->first();
            $comp = null;
            if (!is_null($compID)) {
                $comp = Company::select('Name')->where('ID', $compID->CompanyID)->first();
                $company = Company::select('Name')->where('ID', $compID->CompanyID)->get();
            }
			
			// If the custom company has been created, and the user has selected it, then update the skills drop down to remove duplicates
			$custom = Company::select('ID')->where('Name', $this->company_name())->first();
			if (!is_null($custom)) {
				$skill = array();
				$flag = false;
				
				foreach (Skill::all() as $s) {
					foreach (Requires::select('*')->where('CompanyID', $custom->ID)->get() as $r) {
						if ($s->ID == $r->SkillID) {
							$flag = true;
							break;
						}
					}
					
					if (!$flag) {
						array_push($skill, $s);
					}
					$flag = false;
				}
			}
                
            return view(view: 'dashboard', data: ['taken' => $taken, 'company' => $company, 'aval' => $aval, 'skill' => $skill, 'selection' => $selection, 'comp' => $comp, 'skills' => $requires]);
        }

        return redirect("login")->withSuccess('Please log in to access your dashboard.');
    }

    public function postDashboard(Request $result) {
        $class = $result->input('KeyToDelete');
        $userid = Auth::guard('user')->user()->id;
        //where the ID and the class that they input are equal
        Taken::where('ID', $userid)->where('Class', $class)->delete();
        echo ("Class Record deleted successfully.");
        //return redirect('dashboard');

        return redirect("dashboard")->withSuccess('Cannot delete class');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(Request $data) {
		Student::create([
			'ID' => $data['ID'],
			'Password' => Hash::make($data['Password']),
			'First' => $data['First'],
			'Last' => $data['Last'],
			'Major' => $data['Major'],
			'Year' => $data['Year']
        ]);

        return User::create([
			'name' => $data['First'] . " " . $data['Last'],
			'id' => $data['ID'],
			'email' => $data['email'],
			'password' => Hash::make($data['Password'])
        ]);
    }

    /**
     * Verifies that the grade was sufficient for credit, and adds the chosen class to the taken table.
     *
     * @return redirect to the dashboard with a message explaining any issues
     */
    public function addClass(Request $request) {
		// Find all classes that need a C or better
		foreach (Prerequisite::where('Requirement', 'C or better')->get() as $p) {
			if ($p->Prereq == $request->Class && ($request->Grade == 'D' || $request->Grade == 'F')) {
				// If the chosen class doesn't have a good enough grade, return without adding to the table
				return redirect('dashboard')->withSuccess('You needed to have a C or better in ' . $request->Class . ' to get credit.');
			}
		}

        // Check that they have selected from each drop down
		$request->validate([
            'Class' => 'required',
            'Grade' => 'required',
            'Year' => 'required'
        ]);

		// Add the entry to the Taken table
        $this->createClass($request);

        return redirect('dashboard')->withSuccess('Great! You have successfully added ' . $request->Class . '!');
    }
	
    /*
	 * Adds the class to the taken table using Eloquent syntax.
	 */
    public function createClass(Request $data) {		
        Taken::create([
            'ID' => Auth::guard('user')->user()->id,
            'Class' => $data['Class'],
            'Grade' => $data['Grade'],
            'Year' => $data['Year']
        ]);
    }
    
    public function addCompany(Request $request) {

        $request->validate([
            'CompanyID'=>'required',
        ]);

        //check that they have selected from each drop down
        $this->createSelection($request);

        return redirect('dashboard')->withSuccess('Great! You have successfully selected a company!');
    }
	
    /*
	 * Adds the class to the selection table using Eloquent syntax.
	 */
    public function createSelection(Request $data) {
        Selection::create([
            'ID' => Auth::guard('user')->user()->id,
            'CompanyID' => $data['CompanyID']
        ]);
    }
    
    
    //deleting an entry from the selections table
    public function postCompany(Request $result){
        $comp = $result->input('KeyToDelete');
        $userid = Auth::guard('user')->user()->id;
        //where the ID and the class that they input are equal
        Selection::where('ID', $userid)->delete();
        //return redirect('dashboard');

        return redirect('dashboard')->withSuccess('Cannot delete selection');
    }
    
    //add user as a company, so that they could add skills individually
    public function addSkill(Request $request) {

        //check that they have selected from each drop down
        $this->createSkill($request);

        return redirect('dashboard')->withSuccess('Great! You have successfully added a class!');
    }
	
    // Adds the chosen skill to the custom company for this user, creating and selecting it if necessary.
    public function createSkill(Request $data) {
		// Don't do anything if the empty opeion in the dropdown was selected
		if (is_null($data->skills)) {
			return;
		}
		
		// Create the custom company if it doesn't exist for this user
		$comp = Company::select('ID')->where('Name', $this->company_name())->first();
        if (is_null($comp)) {
            Company::create([
                'Name' => $this->company_name(),
				'Responsibilities' => 'Custom skills.'
            ]);
		}
		// Add the custom company to the selection table if it isn't selected
		if (is_null(Selection::select('*')->where('CompanyID', $comp->ID)->first())) {
			// Delete the old selection
			Selection::where('ID', Auth::guard('user')->user()->id)->delete();
			Selection::create([
				'ID' => Auth::guard('user')->user()->id,
                'CompanyID' => $comp->ID
			]);
        }
        
        return Requires::create([
            'CompanyID' => $comp->ID,
            'SkillID' => $data->skills,
            'Priority' => 0
        ]);
    }
    
    public function postSkill(Request $result){
        $skill = $result->input('KeyToDelete');
        $userid = Company::select('ID')->where('Name', $this->company_name())->first()->ID;
        // Select where the ID and the class that they input are equal
        Requires::where('CompanyID', $userid)->where('SkillID', $skill)->delete();

        return redirect("dashboard")->withSuccess('Cannot delete selection');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('index');
    }

	private function company_name() {
		return Auth::guard('user')->user()->name . '\'s custom selection';
	}
}
