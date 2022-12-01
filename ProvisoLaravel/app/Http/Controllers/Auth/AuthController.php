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
use Hash;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('index');
    }  
    
    public function login()
    {
        
        return view('auth.login');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
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
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'ID' => 'required|unique:students',
            'Password' => 'required',
            'email' =>'required|unique:users',
            'First' => 'required',
            'Last' => 'required',
            'Major' => 'required',
            'Year' => 'required'
            
        ]);
           
        //$data = $request->all();
        $check = $this->create($request);
         
        return redirect("login")->withSuccess('Great! You have successfully registered!');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::guard('user')->check()){
            $flag = false;
            $taken = Taken::select('*')->where('ID', Auth::guard('user')->user()->id);
            $class = Classes::all();
            $aval = array();
            $skill = Skill::all(); 
            $company = Company::all();
            foreach($class as $c){
                foreach($taken as $t){
                    if($t["Class"] == $c["Class"]){$flag = true;}
                }
                if(!$flag){
                    array_push($aval, $c);
                }
                $flag = false;
            }  
            return view(view: 'dashboard', data: ['taken'=>$taken, 'company'=>$company, 'aval'=>$aval, 'skill'=>$skill]);
        }
        
        
        
  
        return redirect("login")->withSuccess('Oops! You do not have access');
    }
    public function postDashboard(Request $result)
    {
        $id = $result->input('KeyToDelete');
        $userid = Auth::id();
        if($userid != $id){
            Taken::where('ID', $id)->delete();
            echo ("Class Record deleted successfully.");
            return redirect ('dashboard');
        }
        return redirect("dashboard")->withSuccess('Cannot delete logged in student');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(Request $data)
    {
        $books = new Student();
        $books->ID = $data->ID;
        $books->Password = Hash::make($data->Password);
        $books->First = $data->First;
        $books->Last = $data->Last;
        $books->Major = $data->Major;
        $books->Year = $data->Year;
        if($books->save()){
            //return true;
        }
        
       return User::create([

        'name' => $data['First'] . " " . $data['Last'],
           
        'id' => $data['ID'],

        'email' => $data['email'],

        'password' => Hash::make($data['Password'])

      ]);
      /*return Student::create([
        'ID' => $data['ID'],
        'Password' => Hash::make($data['Password']),
        'First' => $data['First'],
        'Last' => $data['Last'],
        'Major' => $data['Major'],
        'Year' => $data['Year']   
      ]);*/
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addClass(Request $request){
        
        $request->validate([   
            'Class' => 'required',
            'Grade' => 'required',
            'Year' => 'required'
        ]);
        
        //check that they have selected from each drop down
        $this->createClass($request);
        
        return redirect("dashboard")->withSuccess('Great! You have successfully added a class!');
    }
    
    public function createClass(Request $data){
        return Taken::create([
        'ID' => Auth::guard('user')->user()->id,
        'Class' => $data['Class'],
        'Grade' => $data['Grade'],
        'Year' => $data['Year']   
      ]);
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('index');
    }
}

