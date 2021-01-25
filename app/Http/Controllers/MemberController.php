<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\member_specialty as MemberSpecialty;
use App\Models\Specialty;
use App\Models\Chapter; 
use Illuminate\Http\Request;
use App\Notifications\MemberRegistration;
use Illuminate\Support\Facades\Notification;
use App\Traits\MemberTrait;
use App\Traits\UploadTrait;
use Auth;
class MemberController extends Controller
{
    use MemberTrait, UploadTrait;
    public function dashboard(){
        return view('member.dashbord');
    }
    public function login()
    {
        return view('member.auth.login');
    }
    public function member_login(Request $request)
    {
        // $member = Member::where('email', $request->email)->orWhere('username', $request->email)->first();
        // dd($member);
        if(Auth::guard('members')->attempt([
            'email' =>  $request->email,
            'password' => $request->password
        ])){
            return redirect()->route('member.dashboard');
        }
        return redirect()->back();
    }
     /**
     * Display a register page
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {   
        $chapters = Chapter::all();
        $specialties = Specialty::all();
        return view('member.auth.register')
        ->with('chapters', $chapters)
        ->with('specialties', $specialties);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member =  Member::create([
        'username' => $request->username,
        'surname' => $request->surname,
        'othername' => $request->othername,
        'gender' => $request->gender,
        'role' => 0,
        'chapter_id' => $request->chapter_id,
        'email' => $request->email,
        'profile_pix' => 'default_member_image.png',
        'password' => bcrypt($request->password),
        ]);
        
        $this->save_member_specialty($member, $request->specialty);
        
      
        dd("Success");
    }

    private function save_member_specialty($isMember, array $specialties_data){
        /**
         * Member Specialty.
         *
         * @param  obj $isMember, array $specialties_data
         * @return null
        */
        if($isMember){ 
            $specialties = $specialties_data; //get array
            foreach($specialties as $specialty){
                $member_specialty = new MemberSpecialty;
                $member_specialty->member_id = $isMember->id;
                $member_specialty->specialty_id = $specialty;
                $member_specialty->save();
            }
            $this->send_notification($isMember);
         }
    }

    private function send_notification($isMember){
         /**
         * Member Specialty.
         *
         * @param  bool $isMember, array $specialties_data
         * @return null
        */
        $notificationData['gender'] = $this->check_member_gender($isMember->gender);
        $notificationData['message'] = "We are glad to receive your information to join our tech community. Please wait for approval from your Chapter President to login to this platform";
        Notification::send($isMember, new MemberRegistration($notificationData));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $members = $member::all();
        return view('administrator.member.index')->with('members', $members);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $chapters = Chapter::all();
        $specialties = Specialty::all();

        $member = $member::find(Auth('members')->user()->id);
        return view('member.settings')
        ->with('member', $member)
        ->with('chapters', $chapters)
        ->with('specialties', $specialties);
    }

    public function update_image(Request $request,$id){
        $member = Member::find($id);
        $member->profile_pix = $this->file_upload('member_image','member/profile/');
        $member->save();
        dd("saved");
        // member_image
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
         $member->username  = $request->input('username');
         $member->surname = $request->input('surname');
         $member->othername = $request->input('othername');
         $member->gender = $request->input('gender');
         $member->chapter_id = $request->input('chapter_id');
         $member->email = $request->input('email');
         $member->twitter = $request->input('twitter');
         $member->bio = $request->input('bio');
         $member->save();
         dd("saved");
    }

    public function update_password(Request $request, $id){
        $request->validate([
            'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:6'
        ]);
        $member = Member::find($id); 
        $member->password = bcrypt($request->input('password'));
        $member->save();
        dd("saved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
