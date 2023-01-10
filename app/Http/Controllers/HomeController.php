<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coordinator;
use App\Models\Scholar;
use App\Models\Grades;
use App\Models\Attachments;
use App\Models\Scholar_request;
use App\Models\Incident_report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget'));
    }

    public function login_process(Request $request)
    {
        if ($request->input('login_as') == 'Coordinator') {
            $coordinator = Coordinator::where('email', $request->input('email'))->first();
            if (Hash::check($request->input('password'), $coordinator->password)) {
                return redirect()->route('coordinator_scholar_list', [
                    'id' => $coordinator->id,
                ]);
            } else {
                return redirect('/')->with('error', 'Wrong Credentials');
            }
        } elseif ($request->input('login_as') == 'Student') {
            $scholar = Scholar::where('email', $request->input('email'))->first();
            if ($scholar) {
                if ($scholar->password == $request->input('password')) {
                    return redirect()->route('scholar_dashboard', [
                        'id' => $scholar->id,
                    ]);
                } else {
                    return redirect('/')->with('error', 'Wrong Credentials');
                }
            } else {
                return redirect('/')->with('error', 'Wrong Credentials');
            }
        } elseif ($request->input('login_as') == 'Admin') {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect('home')->with('login_as', 'Admin');
            } else {
                return redirect('/')->with('error', 'Wrong Credentials');
            }
        }
    }

    public function coordinator()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('coordinator', compact('widget'));
    }

    public function coordinator_process(Request $request)
    {
        $new = new Coordinator([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $new->save();

        return redirect('coordinator')->with('success', 'Successfully added new coordinator');
    }

    public function coordinator_list()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $coordinator = Coordinator::orderBy('id', 'desc')->get();

        return view('coordinator_list', compact('widget'), [
            'coordinator' => $coordinator,
        ]);
    }

    public function scholar(Request $request)
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('scholar', compact('widget'));
    }

    public function scholar_process(Request $request)
    {
        $new = new Scholar([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'birthday' => $request->input('birthday'),
            'age' => $request->input('age'),
            'address' => $request->input('address'),
            'number' => $request->input('number'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'status' => $request->input('status'),
            'course' => $request->input('course'),
            'semester_start' => $request->input('semester_start'),
            'semester_end' => $request->input('semester_end'),
            'school_year_start' => $request->input('school_year_start'),
            'school_year_end' => $request->input('school_year_end'),
            'school' => $request->input('school'),
            'year_level' => $request->input('year_level'),
        ]);

        $new->save();

        return redirect('scholar')->with('success', 'Successfully added new Scholar');
    }

    public function scholar_list()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $scholar = Scholar::orderBy('id', 'desc')->get();

        return view('scholar_list', compact('widget'), [
            'scholar' => $scholar,
        ]);
    }

    public function scholar_dashboard($id)
    {
        $scholar = Scholar::find($id);

        return view('scholar_dashboard', [
            'scholar' => $scholar,
        ]);
    }

    public function scholar_subject($id)
    {
        $scholar = Scholar::find($id);

        return view('scholar_grades', [
            'scholar' => $scholar,
        ])->with('id', $id);
    }

    public function scholar_subject_proceed(Request $request)
    {
        //return $request->input();
        return view('scholar_subject_proceed')
            ->with('number_of_subjects', $request->input('number_of_subjects'))
            ->with('id', $request->input('scholar_id'));
    }

    public function scholar_subject_process(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        for ($i = 0; $i < $request->input('number_of_subjects'); $i++) {
            $new = new Grades([
                'scholar_id' => $request->input('scholar_id'),
                'subject_code' => $request->input('subject_code'),
                'subject_name' => $request->input('subject_name'),
                'subject_units' => $request->input('subject_units'),
                'subject_grades' => $request->input('subject_grades'),
                'status' => $request->input('status'),
                'submitted_date' => $date,
                'school_year' => $request->input('school_year'),
                'semester' => $request->input('semester'),
            ]);

            $new->save();
        }

        $attachment = $request->file('attachment');
        $attachment_name =  uniqid() . "." . $attachment->getClientOriginalExtension();
        $attachment_file_type = $attachment->getClientmimeType();
        $path_attachment = $attachment->storeAs('public', $attachment_name);

        $new_attachment = new Attachments([
            'attachment' => $attachment_name,
            'scholar_id' => $request->input('scholar_id'),
        ]);

        $new_attachment->save();

        return redirect()->route('scholar_subject', [
            'id' => $request->input('scholar_id'),
        ])->with('success', 'Successfully added scholar grades');
    }

    public function scholar_request($id)
    {
        $scholar = Scholar::find($id);
        return view('scholar_request', [
            'scholar' => $scholar,
        ])->with('id', $id);
    }

    public function scholar_request_process(Request $request)
    {
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $new = new Scholar_request([
            'scholar_id' => $request->input('scholar_id'),
            'request_name' => $request->input('request_name'),
            'request_details' => $request->input('request_details'),
            'request_type' => $request->input('request_type'),
            'request_date' => $date,
            'status' => 'Pending',
        ]);

        $new->save();

        return redirect()->route('scholar_request', [
            'id' => $request->input('scholar_id'),
        ])->with('success', 'Request Successfull');
    }

    public function coordinator_scholar_list($id)
    {
        $coordinator = Coordinator::find($id);
        $scholar = Scholar::get();
        return view('coordinator_scholar_list', [
            'coordinator' => $coordinator,
            'scholar' => $scholar
        ])->with('id', $id);
    }

    public function coordinator_scholar_request($id)
    {
        $coordinator = Coordinator::find($id);
        $scholar_request = Scholar_request::get();
        return view('coordinator_scholar_request', [
            'coordinator' => $coordinator,
            'scholar_request' => $scholar_request
        ])->with('id', $id);
    }

    public function coordinator_scholar_incident_report($id)
    {
        $coordinator = Coordinator::find($id);
        $scholar = Scholar::get();
        return view('coordinator_scholar_incident_report', [
            'coordinator' => $coordinator,
            'scholar' => $scholar
        ])->with('id', $id);
    }

    public function coordinator_scholar_incident_report_process(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $new = new Incident_report([
            'coordinator_id' => $request->input('coordinator_id'),
            'scholar_id' => $request->input('scholar_id'),
            'report_type' => $request->input('report_type'),
            'action_taken' => $request->input('action_taken'),
            'report_date' => $date,
            'remarks' => $request->input('remarks'),
        ]);

        $new->save();

        return redirect()->route('coordinator_scholar_incident_report', [
            'id' => $request->input('coordinator_id'),
        ])->with('success', 'Report Successfull');
    }
}
