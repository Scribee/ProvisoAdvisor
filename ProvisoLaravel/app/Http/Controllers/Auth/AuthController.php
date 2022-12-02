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
            $skill = Skill::all();
            $userid = Company::select('ID')->where('Name', $this->company_name())->first();
            $requires = array();
            if (!is_null($userid)) {
                $requires = Requires::select('*')->where('CompanyID', $userid->ID)->get();
            }
            $company = Company::all();
            $selection = Selection::select('*')->where('ID', Auth::guard('user')->user()->id);
            foreach ($class as $c) {
                foreach ($taken->get() as $t) {
                    if ($t["Class"] == $c["Class"]) {
                        $flag = true;
                    }
                }
                if (!$flag) {
                    array_push($aval, $c);
                }
                $flag = false;
            }
            //if a company has been selected i.e. selection is not null for their id, update dropdown menu of company to not have any values
      
            $compID = Selection::select('*')->where('ID', Auth::guard('user')->user()->id)->first();
            $comp = null;
            if (!is_null($compID)) {
                $comp = Company::select('Name')->where('ID', $compID->CompanyID)->first();
                $company = Company::select('Name')->where('ID', $compID->CompanyID)->get();
            }
                
            return view(view: 'dashboard', data: ['taken' => $taken, 'company' => $company, 'aval' => $aval, 'skill' => $skill, 'selection' => $selection, 'comp' => $comp, 'skills' => $requires]);
        }

        return redirect("login")->withSuccess('Oops! You do not have access');
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
        $student = new Student();
        $student->ID = $data->ID;
        $student->Password = Hash::make($data->Password);
        $student->First = $data->First;
        $student->Last = $data->Last;
        $student->Major = $data->Major;
        $student->Year = $data->Year;
        if ($student->save()) {
            //return true;
        }

        return User::create([
                    'name' => $data['First'] . " " . $data['Last'],
                    'id' => $data['ID'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['Password'])
        ]);
        /* return Student::create([
          'ID' => $data['ID'],
          'Password' => Hash::make($data['Password']),
          'First' => $data['First'],
          'Last' => $data['Last'],
          'Major' => $data['Major'],
          'Year' => $data['Year']
          ]); */
    }

    /**
     * adds classes to the taken table 
     *
     * @return redirect to the dashboard
     */
    public function addClass(Request $request) {

        $request->validate([
            'Class' => 'required',
            'Grade' => 'required',
            'Year' => 'required'
        ]);

        //check that they have selected from each drop down
        $this->createClass($request);

        return redirect("dashboard")->withSuccess('Great! You have successfully added a class!');
    }
	
    //adds the class to the taken table using the model Taken
    public function createClass(Request $data) {
        return Taken::create([
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

        return redirect("dashboard")->withSuccess('Great! You have successfully added a class!');
    }
	
    //adds the class to the taken table using the model Taken
    public function createSelection(Request $data) {
        return Selection::create([
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

        return redirect("dashboard")->withSuccess('Cannot delete selection');
    }
    
    //add user as a company, so that they could add skills individually
    public function addSkill(Request $request) {

        //check that they have selected from each drop down
        $this->createSkill($request);

        return redirect("dashboard")->withSuccess('Great! You have successfully added a class!');
    }
	
    //adds the class to the taken table using the model Taken
    public function createSkill(Request $data) {
        if (is_null(Company::select('ID')->where('Name', $this->company_name())->first())) {
            Company::create([
                'Name' => $this->company_name()
            ]);
		}
		else if (is_null(Selection::select('*')->where('CompanyID', Company::select('ID')->where('Name', $this->company_name())->first()->ID)->first())) {
			Selection::create([
				'ID' => Auth::guard('user')->user()->id,
                'CompanyID' => Company::select('ID')->where('Name', $this->company_name())->first()->ID
			]);
        }
        
        return Requires::create([
            'CompanyID' => Company::select('ID')->where('Name', $this->company_name())->first()->ID,
            'SkillID' => $data->skills,
            'Priority' => 0
        ]);
    }
    
    public function postSkill(Request $result){
        $skill = $result->input('KeyToDelete');
        $userid = Company::select('ID')->where('Name', $this->company_name())->first()->ID;
        //where the ID and the class that they input are equal
        Requires::where('CompanyID', $userid)->where('SkillID', $skill)->delete();
        //return redirect('dashboard');

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
