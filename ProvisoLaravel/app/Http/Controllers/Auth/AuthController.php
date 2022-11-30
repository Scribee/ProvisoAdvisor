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
            'email' =>'required',
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
            
            $taken = Taken::all();
            $class = Classes::all();
            $aval = array();
            foreach($class as $c){
                foreach($taken as $t){
                    if($t["Class"] != $c["Class"]){
                        array_push($aval, $c);
                    }
                }  
            }
            $skill = Skill::all(); 
            $comp = Company::all();
            return view('dashboard',['aval'=>$aval],['skill'=>$skill],['comp'=>$comp],['taken'=>$taken]);
        }
        
        
        
  
        return redirect("login")->withSuccess('Oops! You do not have access');
    }
    /*public function postDashboard(Request $result)
    {
        $id = $result->input('KeyToDelete');
        $userid = Auth::id();
        if($userid != $id){
            Student::where('ID', $id)->firstorfail()->delete();
            echo ("Student Record deleted successfully.");
            return view ('dashboard');
        }
        return redirect("dashboard")->withSuccess('Cannot delete logged in student');
    }*/
    
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
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('login');
    }
}

