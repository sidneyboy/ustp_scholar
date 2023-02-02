<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coordinator;
use App\Models\Scholar;
use App\Models\Grades;
use App\Models\Attachments;
use App\Models\Scholar_request;
use App\Models\Incident_report;
use App\Models\Academmic_year;
use App\Models\School;
use App\Models\Grade_details;
use App\Models\Notification;
use App\Models\Transfer_logs;
use App\Models\Course;
use App\Mail\Send_email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect('coordinator')->with('login_as', 'Admin');
            } else {
                return redirect('/')->with('error', 'Wrong Credentials');
            }
        } else {
            $coordinator = Coordinator::where('email', $request->input('email'))->first();
            if ($coordinator) {
                if (Hash::check($request->input('password'), $coordinator->password)) {
                    return redirect()->route('coordinator_scholar_list', [
                        'id' => $coordinator->id,
                    ]);
                } else {
                    return redirect('/')->with('error', 'Wrong Credentials');
                }
            } else {
                $scholar = Scholar::where('email', $request->input('email'))->first();

                if ($scholar) {
                    if ($scholar->password == $request->input('password')) {
                        return redirect()->route('scholar_submission', [
                            'id' => $scholar->id,
                        ]);
                    } else {
                        return redirect('/')->with('error', 'Wrong Credentials');
                    }
                } else {
                    return redirect('/')->with('error', 'Wrong Credentials');
                }
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

        $notification = Notification::where('notify_to', Auth()->user()->id)->where('user_type', 'admin')->where('status', 'Pending')->get();

        return view('coordinator', compact('widget'), [
            'notification' => $notification
        ]);
    }

    public function coordinator_process(Request $request)
    {
        $new = new Coordinator([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_type' => 'coordinator',
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

    public function scholar_page()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $scholar = Scholar::orderBy('id', 'desc')->get();

        $notification = Notification::where('notify_to', Auth()->user()->id)->where('user_type', 'admin')->where('status', 'Pending')->get();

        return view('scholar_page', compact('widget'), [
            'scholar' => $scholar,
            'notification' => $notification,
        ]);
    }

    public function scholar(Request $request)
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $notification = Notification::where('notify_to', Auth()->user()->id)->where('user_type', 'admin')->where('status', 'Pending')->get();
        $academic_year = Academmic_year::get();
        $course = Course::get();
        return view('scholar', compact('widget'), [
            'notification' => $notification,
            'academic_year' => $academic_year,
            'course' => $course,
        ]);
    }

    public function scholar_process(Request $request)
    {
        //return $request->input();

        $password = $request->input('last_name') . "-" . $request->input('scholar_no');
        $new = new Scholar([
            'scholar_no' => $request->input('scholar_no'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'birthday' => $request->input('birthday'),
            'age' => 'none',
            'address' => $request->input('address'),
            'number' => $request->input('number'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'password' => $password,
            'status' => $request->input('status'),
            'course' => $request->input('course'),
            'semester_start' => $request->input('semester_start'),
            'semester_end' => $request->input('semester_end'),
            'school_year_start' => $request->input('school_year_start'),
            'school_year_end' => $request->input('school_year_end'),
            'school' => $request->input('school'),
            'year_level' => $request->input('year_level'),
            'user_type' => 'scholar',
        ]);

        $new->save();

        $subject = 'DOST NOTIFICATION';
        $messages = 'Good day. We are happy to inform you that you are officialy enrolled in DOST scholar Management Sysmtem. Here are your credentials email:' . $request->input('email') . " and password:" . $password;
        Mail::to($request->input('email'))->send(new Send_email($subject, $messages));

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

    public function scholar_submission($id)
    {
        $scholar = Scholar::find($id);
        $grades = Grades::where('scholar_id', $id)->get();
        $school = School::get();
        $academic_year = Academmic_year::get();
        $notification = Notification::where('notify_to', $id)->where('user_type', 'student')->where('status', 'Pending')->get();
        return view('scholar_submission', [
            'scholar' => $scholar,
            'grades' => $grades,
            'school' => $school,
            'academic_year' => $academic_year,
            'notification' => $notification,
        ])->with('id', $id);
    }

    public function scholar_submission_process(Request $request)
    {

        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');

        $data = explode(" ", $request->input('text_data'));

        foreach ($data as $key => $value) {
            if (str_contains($value, 'CD')) {
                $subject_code[] = $value;
            } elseif (str_contains($value, 'DP')) {
                $subject_name[] = $value;
            } elseif (str_contains($value, 'UN')) {
                $subject_units[] = $value;
            } elseif (str_contains($value, 'SC')) {
                $section[] = $value;
            } elseif (str_contains($value, 'MDT')) {
                $midterm[] = $value;
            } elseif (str_contains($value, 'FNL')) {
                $final[] = $value;
            } elseif (str_contains($value, 'RK-')) {
                $remarks[] = $value;
            }
        }

      

        $new_grade_details = new Grade_details([
            'scholar_id' => $request->input('id'),
            'school_id' => $request->input('school_id'),
            'academic_year_id' => $request->input('academic_year_id'),
            'semester' => $request->input('semester'),
            'original_text_from_image' => $request->input('text_data'),
            'status' => 'Pending',
        ]);

        $new_grade_details->save();

        for ($i = 0; $i < count($subject_code); $i++) {
            $new = new Grades([
                'grade_details_id' => $new_grade_details->id,
                'scholar_id' => $request->input('id'),
                'subject_code' => $subject_code[$i],
                'subject_name' => $subject_name[$i],
                'subject_units' => $subject_units[$i],
                'section' => $section[$i],
                'midterm' => $midterm[$i],
                'final' => $final[$i],
            ]);

            $new->save();
        }

        $coordinator = Coordinator::select('id', 'email')->get();
        $academ = Academmic_year::find($request->input('academic_year_id'));
        foreach ($coordinator as $key => $data) {
            $scholar = Scholar::find($request->input('id'));

            $subject = 'DOST NOTIFICATION';
            $messages = 'Scholar named ' . $scholar->first_name . " " . $scholar->last_name . ' has submitted his/her grades for academic year ' . $academ->school_year . " " . $request->input('semester');
            Mail::to($data->email)->send(new Send_email($subject, $messages));

            $new_notification = new Notification([
                'user_id' => $request->input('id'),
                'notify_to' => $data->id,
                'user_type' => 'coordinator',
                'notification_name' => 'Grades',
                'notification_details' => 'Scholar ' . $scholar->first_name . " " . $scholar->last_name . ' has submitted his/her grades',
                'status' => 'Pending',
            ]);

            $new_notification->save();
        }

        return 'saved';
    }

    public function scholar_submission_process_final(Request $request)
    {
        //dd($request->all());

        $grade_details = Grade_details::select('id')->where('scholar_id', $request->input('id'))->latest()->first();

        $file = $request->file('file');
        $file_name = time() . "." . $file->getClientOriginalExtension();
        $file_file_type = $file->getClientmimeType();
        $path_file = $file->storeAs('storage', $file_name);

        $original_file = $request->file('original_file');
        $original_file_name = time() . "." . $original_file->getClientOriginalExtension();
        $original_path_file = $original_file->storeAs('storage', $original_file_name);

        $new = new Attachments([
            'grade_details_id' => $grade_details->id,
            'attachment' => $file_name,
            'original_file' => $original_file_name,
            'scholar_id' => $request->input('id'),
            'status' => 'Pending',
        ]);

        $new->save();


        return redirect()->route('scholar_submission', ['id' => $request->input('id')])->with('success', 'Successfully Uploaded. Please wait for email notification');
    }
    public function scholar_subject($id)
    {
        $coordinator = Coordinator::find($id);
        $grade_details = Grade_details::where('status', 'Pending')->orderBy('id', 'desc')->get();

        $notification = Notification::where('notify_to', $id)->where('user_type', 'coordinator')->where('status', 'Pending')->get();

        return view('scholar_subject', [
            'coordinator' => $coordinator,
            'grade_details' => $grade_details,
            'notification' => $notification,
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
        return 'dri ang tiwas unya';
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
            'id' => $request->input('id'),
        ])->with('success', 'Successfully added scholar grades');
    }

    public function scholar_request_page($id)
    {

        $scholar = Scholar::find($id);
        $request = Scholar_request::where('scholar_id', $id)->orderBy('id', 'desc')->get();
        $notification = Notification::where('notify_to', $id)->where('user_type', 'student')->where('status', 'Pending')->get();
        return view('scholar_request_page', [
            'scholar' => $scholar,
            'request' => $request,
            'notification' => $notification,
        ])->with('id', $id);
    }

    public function scholar_request($id)
    {
        $scholar = Scholar::find($id);
        $notification = Notification::where('notify_to', $id)->where('user_type', 'student')->where('status', 'Pending')->get();
        $school = School::get();
        $course = Course::get();
        $year = Academmic_year::get();
        return view('scholar_request', [
            'scholar' => $scholar,
            'school' => $school,
            'notification' => $notification,
            'course' => $course,
            'year' => $year,
        ])->with('id', $id);
    }

    public function scholar_request_process(Request $request)
    {
        //return $request->input();

        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');


        if ($request->input('request_type') == 'Transfer School') {
            if ($request->input('school') != null) {
                $attachment = $request->file('file');
                $attachment_name =  uniqid() . "." . $attachment->getClientOriginalExtension();
                $attachment_file_type = $attachment->getClientmimeType();
                $path_attachment = $attachment->storeAs('public', $attachment_name);

                $new = new Scholar_request([
                    'scholar_id' => $request->input('scholar_id'),
                    'request_type' => $request->input('request_type'),
                    'request_date' => $date,
                    'status' => 'Pending',
                    'course' => 'N/A',
                    'file' => $attachment_name,
                    'semester' => $request->input('semester'),
                    'school' => $request->input('school'),
                    'school_year' => $request->input('year'),
                ]);

                $new->save();

                $admin = User::select('id', 'email')->get();
                $academ = Academmic_year::find($request->input('academic_year_id'));
                foreach ($admin as $key => $data) {
                    $scholar = Scholar::find($request->input('scholar_id'));

                    $subject = 'DOST NOTIFICATION';
                    $messages = 'Scholar named ' . $scholar->first_name . " " . $scholar->last_name . ' has submitted a new request';
                    Mail::to($data->email)->send(new Send_email($subject, $messages));

                    $new_notification = new Notification([
                        'user_id' => $request->input('scholar_id'),
                        'notify_to' => $data->id,
                        'user_type' => 'admin',
                        'notification_name' => 'Grades',
                        'notification_details' => 'Scholar named ' . $scholar->first_name . " " . $scholar->last_name . ' has submitted a new request',
                        'status' => 'Pending',
                    ]);

                    $new_notification->save();
                }

                return redirect()->route('scholar_request', [
                    'id' => $request->input('scholar_id'),
                ])->with('success', 'Request Successful');
            } else {
                return redirect()->route('scholar_request', [
                    'id' => $request->input('scholar_id'),
                ])->with('error', 'Please select request type');
            }
        } elseif ($request->input('request_type') == 'Transfer Course') {
            if ($request->input('course') != null) {
                $attachment = $request->file('file');
                $attachment_name =  uniqid() . "." . $attachment->getClientOriginalExtension();
                $attachment_file_type = $attachment->getClientmimeType();
                $path_attachment = $attachment->storeAs('public', $attachment_name);

                $new = new Scholar_request([
                    'scholar_id' => $request->input('scholar_id'),
                    'request_type' => $request->input('request_type'),
                    'request_date' => $date,
                    'status' => 'Pending',
                    'course' => $request->input('course'),
                    'file' => $attachment_name,
                    'semester' => $request->input('semester'),
                    'school' => 'N/A',
                    'school_year' => $request->input('year'),
                ]);

                $new->save();

                $admin = User::select('id', 'email')->get();
                $academ = Academmic_year::find($request->input('academic_year_id'));
                foreach ($admin as $key => $data) {
                    $scholar = Scholar::find($request->input('scholar_id'));

                    $subject = 'DOST NOTIFICATION';
                    $messages = 'Scholar named ' . $scholar->first_name . " " . $scholar->last_name . ' has submitted a new request';
                    Mail::to($data->email)->send(new Send_email($subject, $messages));

                    $new_notification = new Notification([
                        'user_id' => $request->input('scholar_id'),
                        'notify_to' => $data->id,
                        'user_type' => 'admin',
                        'notification_name' => 'Grades',
                        'notification_details' => 'Scholar named ' . $scholar->first_name . " " . $scholar->last_name . ' has submitted a new request',
                        'status' => 'Pending',
                    ]);

                    $new_notification->save();
                }

                return redirect()->route('scholar_request', [
                    'id' => $request->input('scholar_id'),
                ])->with('success', 'Request Successful');
            } else {
                return redirect()->route('scholar_request', [
                    'id' => $request->input('scholar_id'),
                ])->with('error', 'Please select request type');
            }
        }


        // date_default_timezone_set('Asia/Manila');
        // $date = date('Y-m-d');
        // $new = new Scholar_request([
        //     'scholar_id' => $request->input('scholar_id'),
        //     'request_name' => $request->input('request_name'),
        //     'request_details' => $request->input('request_details'),
        //     'request_type' => $request->input('request_type'),
        //     'request_date' => $date,
        //     'status' => 'Pending',
        // ]);

        // $new->save();

        // $admin = User::select('id', 'email')->get();
        // $academ = Academmic_year::find($request->input('academic_year_id'));
        // foreach ($admin as $key => $data) {
        //     $scholar = Scholar::find($request->input('scholar_id'));

        //     $subject = 'DOST NOTIFICATION';
        //     $messages = 'Scholar named ' . $scholar->first_name . " " . $scholar->last_name . ' has submitted a new request';
        //     Mail::to($data->email)->send(new Send_email($subject, $messages));

        //     $new_notification = new Notification([
        //         'user_id' => $request->input('scholar_id'),
        //         'notify_to' => $data->id,
        //         'user_type' => 'admin',
        //         'notification_name' => 'Grades',
        //         'notification_details' => 'Scholar named ' . $scholar->first_name . " " . $scholar->last_name . ' has submitted a new request',
        //         'status' => 'Pending',
        //     ]);

        //     $new_notification->save();
        // }

        // return redirect()->route('scholar_request', [
        //     'id' => $request->input('scholar_id'),
        // ])->with('success', 'Request Successful');
    }

    public function coordinator_scholar_list($id)
    {
        $coordinator = Coordinator::find($id);
        $scholar = Scholar::get();

        $notification = Notification::where('notify_to', $id)->where('user_type', 'coordinator')->where('status', 'Pending')->get();
        return view('coordinator_scholar_list', [
            'coordinator' => $coordinator,
            'notification' => $notification,
            'scholar' => $scholar
        ])->with('id', $id);
    }

    public function coordinator_scholar_request($id)
    {
        $coordinator = Coordinator::find($id);
        $scholar_request = Scholar_request::orderBy('id','desc')->get();
        $notification = Notification::where('notify_to', $id)->where('user_type', 'coordinator')->where('status', 'Pending')->get();
        return view('coordinator_scholar_request', [
            'coordinator' => $coordinator,
            'scholar_request' => $scholar_request,
            'notification' => $notification
        ])->with('id', $id);
    }

    public function coordinator_scholar_incident_report($id)
    {
        $coordinator = Coordinator::find($id);
        $scholar = Scholar::get();
        $incident_report = Incident_report::orderBy('id', 'desc')->get();
        $notification = Notification::where('notify_to', $id)->where('user_type', 'coordinator')->where('status', 'Pending')->get();
        return view('coordinator_scholar_incident_report', [
            'coordinator' => $coordinator,
            'scholar' => $scholar,
            'incident_report' => $incident_report,
            'notification' => $notification
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

    public function scholar_subject_view($id, $grade_id)
    {
        $coordinator = Coordinator::find($id);
        $grade_details = Grade_details::find($grade_id);

        $grades = Grades::where('grade_details_id', $grade_id)->get();

        $notification = Notification::where('notify_to', $id)->where('user_type', 'coordinator')->where('status', 'Pending')->get();

        return view('scholar_subject_view', [
            'grade_details' => $grade_details,
            'notification' => $notification,
            'coordinator' => $coordinator,
            'grades' => $grades,
            'grade_id' => $grade_id,
        ]);
    }

    public function coordinator_final_edit_of_grades(Request $request)
    {
        //return $request->input();
        Grade_details::where('id', $request->input('grade_details_id'))
            ->update([
                'status' => 'Validated',
            ]);


        Attachments::where('id', $request->input('attachment_id'))
            ->update([
                'status' => 'Validated',
            ]);



        foreach ($request->input('id') as $key => $data) {
            Grades::where('id', $data)
                ->update([
                    'subject_code' => $request->input('subject_code')[$data],
                    'subject_name' => $request->input('subject_name')[$data],
                    'subject_units' => $request->input('subject_units')[$data],
                    // 'subject_grades' => $request->input('subject_grades')[$data],
                    'midterm' => $request->input('midterm')[$data],
                    'final' => $request->input('final')[$data],
                    'section' => $request->input('section')[$data],
                    'remarks' => $request->input('remarks')[$data],
                ]);
        }


        $scholar = Scholar::find($request->input('scholar_id'));

        $subject = 'DOST NOTIFICATION';
        $messages = 'Good day. We would like to inform you that your grades has been validated by our coordinators. Thank you';
        Mail::to($scholar->email)->send(new Send_email($subject, $messages));

        $new_notification = new Notification([
            'user_id' => $request->input('coordinator_id'),
            'notify_to' => $request->input('scholar_id'),
            'user_type' => 'student',
            'notification_name' => 'Grades',
            'notification_details' => 'Good day. We would like to inform you that your grades has been validated by our coordinators. Thank you',
            'status' => 'Pending',
        ]);

        $new_notification->save();



        return redirect()->route('coordinator_scholar_specific_list', [
            'id' => $request->input('coordinator_id'),
            'scholar_id' => $request->input('scholar_id'),
        ])->with('success', 'Work successfully saved');
    }

    public function coordinator_incident_report_process(Request $request)
    {
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');

        $new = new Incident_report([
            'coordinator_id' => $request->input('coordinator_id'),
            'scholar_id' => $request->input('scholar_id'),
            'report_type' => $request->input('report_type'),
            'action_taken' => $request->input('action_taken'),
            'grade_details_id' => $request->input('grade_details_id'),
            'report_date' => $date,
            'remarks' => $request->input('remarks'),
        ]);

        $new->save();

        Grade_details::where('id', $request->input('grade_details_id'))
            ->update(['status' => 'Rejected']);


        $scholar = Scholar::find($request->input('scholar_id'));

        $subject = 'DOST NOTIFICATION';
        $messages = 'Good day. We would like to inform you that an incident report was filed to you. please check on our website to check the details of the said report.';
        Mail::to($scholar->email)->send(new Send_email($subject, $messages));

        $new_notification = new Notification([
            'user_id' => $request->input('coordinator_id'),
            'notify_to' => $request->input('scholar_id'),
            'user_type' => 'student',
            'notification_name' => 'Incident Report',
            'notification_details' => 'Good day. We would like to inform you that an incident report was filed to you. please check on our website to check the details of the said report.',
            'status' => 'Pending',
        ]);

        $new_notification->save();



        return redirect()->route('coordinator_scholar_specific_list', [
            'id' => $request->input('coordinator_id'),
            'scholar_id' => $request->input('scholar_id'),
        ])->with('success', 'Work successfully saved');
    }

    public function coordinator_update_status(Request $request)
    {
        //return $request->input();

        Scholar::where('id', $request->input('scholar_id'))
            ->update(['status' => $request->input('status')]);


        $scholar = Scholar::select('email', 'first_name', 'last_name')->find($request->input('scholar_id'));

        $subject = 'DOST NOTIFICATION';
        $messages = 'Good day, we would like to inform you that DOST coordinator has changed your scholarship status into ' . $request->input('status');
        Mail::to($scholar->email)->send(new Send_email($subject, $messages));


        return redirect()->route('coordinator_scholar_list', [
            'id' => $request->input('coordinator_id'),
        ])->with('success', 'Work successfully saved');
    }

    public function admin_incident_report_list()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $incident_report = Incident_report::orderBy('id', 'desc')->get();
        $notification = Notification::where('notify_to', Auth()->user()->id)->where('user_type', 'admin')->where('status', 'Pending')->get();

        return view('admin_incident_report_list', compact('widget'), [
            'incident_report' => $incident_report,
            'notification' => $notification,
        ]);
    }

    public function scholar_incident_report_page($id)
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $scholar = scholar::find($id);

        $incident_report = Incident_report::where('scholar_id', $id)->orderBy('id', 'desc')->get();
        $notification = Notification::where('notify_to', $id)->where('user_type', 'student')->where('status', 'Pending')->get();

        return view('scholar_incident_report_page', compact('widget'), [
            'incident_report' => $incident_report,
            'scholar' => $scholar,
            'notification' => $notification,
        ]);
    }

    public function scholar_upload_coe($id)
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $scholar = scholar::find($id);
        $notification = Notification::where('notify_to', $id)->where('user_type', 'student')->where('status', 'Pending')->get();

        return view('scholar_upload_coe', compact('widget'), [
            'scholar' => $scholar,
            'notification' => $notification,
        ]);
    }

    public function scholar_upload_coe_process(Request $request)
    {
        //dd($request->all());

        $file = $request->file('file');
        $file_name = time() . "." . $file->getClientOriginalExtension();
        $file_file_type = $file->getClientmimeType();
        $path_file = $file->storeAs('storage', $file_name);

        $new = new Attachments([
            'attachment' => $file_name,
            'scholar_id' => $request->input('id'),
            'status' => 'Pending',
            'image_type' => 'coe',
        ]);

        $new->save();

        $coordinator = Coordinator::select('id', 'email')->get();
        foreach ($coordinator as $key => $data) {
            $scholar = Scholar::find($request->input('id'));

            $subject = 'DOST NOTIFICATION';
            $messages = 'Scholar named ' . $scholar->first_name . " " . $scholar->last_name . ' has uploaded his/her cetificate of enrollment';
            Mail::to($data->email)->send(new Send_email($subject, $messages));

            $new_notification = new Notification([
                'user_id' => $request->input('id'),
                'notify_to' => $data->id,
                'user_type' => 'student',
                'notification_name' => 'Grades',
                'notification_details' => 'Scholar ' . $scholar->first_name . " " . $scholar->last_name . ' has submitted his/her COR',
                'status' => 'Pending',
            ]);

            $new_notification->save();
        }

        return redirect()->route('scholar_upload_coe', [
            'id' => $request->input('id'),
        ])->with('success', 'Work successfully saved');
    }

    public function coordinator_scholar_coe($id)
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $attachments = Attachments::where('status', 'Pending')->orderBy('id', 'desc')->get();
        $coordinator = Coordinator::find($id);

        $notification = Notification::where('notify_to', $id)->where('user_type', 'coordinator')->where('status', 'Pending')->get();

        return view('coordinator_scholar_coe', compact('widget'), [
            'attachments' => $attachments,
            'notification' => $notification,
            'coordinator' => $coordinator,
        ]);
    }

    public function coordinator_scholar_coe_process($id, $attachment_id, $scholar_id)
    {
        Attachments::where('id', $attachment_id)
            ->update(['status' => 'Validated']);

        $scholar = Scholar::find($scholar_id);

        $subject = 'DOST NOTIFICATION';
        $messages = 'Good day. We are happy to inform you that your certificate of enrollment has been validated by our coordinators. Thank you.';
        Mail::to($scholar->email)->send(new Send_email($subject, $messages));

        $new_notification = new Notification([
            'user_id' => $id,
            'notify_to' => $scholar_id,
            'user_type' => 'student',
            'notification_name' => 'Grades',
            'notification_details' => 'Good day. We are happy to inform you that your certificate of enrollment has been validated by our coordinators. Thank you.',
            'status' => 'Pending',
        ]);

        $new_notification->save();

        return redirect()->route('coordinator_scholar_specific_list', [
            'id' => $id,
            'scholar_id' > $scholar_id,
        ])->with('success', 'Success');
    }

    public function admin_scholar_request_list()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $scholar_request = Scholar_request::orderBy('id', 'desc')->get();

        $notification = Notification::where('notify_to', Auth()->user()->id)->where('user_type', 'admin')->where('status', 'Pending')->get();

        return view('admin_scholar_request_list', compact('widget'), [
            'scholar_request' => $scholar_request,
            'notification' => $notification,
        ]);
    }

    public function admin_scholar_request_process(Request $request)
    {
        //return $request->input();
        if ($request->input('status') == 'Approved') {
            if ($request->input('request_type') == 'Transfer Course') {


                $scholar = Scholar::find($request->input('scholar_id'));

                $scholar_request = Scholar_request::where('id', $request->input('request_id'))->first();

                $new_transfer_logs = new Transfer_logs([
                    'scholar_id' => $request->input('scholar_id'),
                    'transfer_from' => $scholar->course,
                    'transfer_to' => $scholar_request->course,
                    'request_id' => $request->input('request_id'),
                ]);

                $new_transfer_logs->save();

                Scholar_request::where('id', $request->input('request_id'))
                    ->update(['status' => $request->input('status')]);

                Scholar::where('id', $request->input('scholar_id'))
                    ->update(['course' => $scholar_request->course]);

                $subject = 'DOST NOTIFICATION';
                $messages = 'We are happy to inform you that your request has been ' . $request->input('status') . ' by our coordinators. Thank you.';
                Mail::to($scholar->email)->send(new Send_email($subject, $messages));

                $new_notification = new Notification([
                    'user_id' => Auth()->user()->id,
                    'notify_to' => $request->input('scholar_id'),
                    'user_type' => 'student',
                    'notification_name' => 'Grades',
                    'notification_details' => 'We are happy to tell you that your request has been ' . $request->input('status') . ' by our coordinators. Thank you.',
                    'status' => 'Pending',
                ]);

                $new_notification->save();
            } elseif ($request->input('request_type') == 'Transfer School') {


                $scholar = Scholar::find($request->input('scholar_id'));

                $scholar_request = Scholar_request::find($request->input('request_id'));

                $new_transfer_logs = new Transfer_logs([
                    'scholar_id' => $request->input('scholar_id'),
                    'transfer_from' => $scholar->school,
                    'transfer_to' => $scholar_request->school,
                    'request_id' => $request->input('request_id'),
                ]);

                $new_transfer_logs->save();

                Scholar_request::where('id', $request->input('request_id'))
                    ->update(['status' => $request->input('status')]);

                Scholar::where('id', $request->input('scholar_id'))
                    ->update(['school' => $scholar_request->school]);

                $subject = 'DOST NOTIFICATION';
                $messages = 'We are happy to inform you that your request has been ' . $request->input('status') . ' by our coordinators. Thank you.';
                Mail::to($scholar->email)->send(new Send_email($subject, $messages));

                $new_notification = new Notification([
                    'user_id' => Auth()->user()->id,
                    'notify_to' => $request->input('scholar_id'),
                    'user_type' => 'student',
                    'notification_name' => 'Grades',
                    'notification_details' => 'We are happy to tell you that your request has been ' . $request->input('status') . ' by our coordinators. Thank you.',
                    'status' => 'Pending',
                ]);

                $new_notification->save();
            }
        } else {
            Scholar_request::where('id', $request->input('request_id'))
                ->update(['status' => $request->input('status')]);


            $scholar = Scholar::find($request->input('scholar_id'));

            $subject = 'DOST NOTIFICATION';
            $messages = 'We are sad to inform you that your request has been ' . $request->input('status') . ' by our coordinators. Thank you.';
            Mail::to($scholar->email)->send(new Send_email($subject, $messages));

            $new_notification = new Notification([
                'user_id' => Auth()->user()->id,
                'notify_to' => $request->input('scholar_id'),
                'user_type' => 'student',
                'notification_name' => 'Grades',
                'notification_details' => 'We are happy to tell you that your request has been ' . $request->input('status') . ' by our coordinators. Thank you.',
                'status' => 'Pending',
            ]);

            $new_notification->save();
        }


        return redirect('admin_scholar_request_list')->with('success', 'Success');
    }

    public function coordinator_scholar_specific_list($id, $scholar_id)
    {

        $coordinator = Coordinator::find($id);
        $scholar = Scholar::where('id', $scholar_id)->get();
        $notification = Notification::where('notify_to', $id)->where('user_type', 'coordinator')->where('status', 'Pending')->get();
        return view('coordinator_scholar_specific_list', [
            'coordinator' => $coordinator,
            'notification' => $notification,
            'scholar' => $scholar
        ])->with('id', $id);
    }

    public function scholar_submitted_grades($id)
    {

        $scholar = Scholar::find($id);
        $grade_details = Grade_details::where('scholar_id', $id)->orderBy('id', 'desc')->get();

        $notification = Notification::where('notify_to', $id)->where('user_type', 'student')->where('status', 'Pending')->get();
        return view('scholar_submitted_grades', [
            'scholar' => $scholar,
            'grade_details' => $grade_details,
            'notification' => $notification
        ])->with('id', $id);
    }

    public function scholar_grades_view($id, $grade_id)
    {
        $scholar = Scholar::find($id);
        $grade_details = Grade_details::find($grade_id);

        $grades = Grades::where('grade_details_id', $grade_id)->get();
        $notification = Notification::where('notify_to', $id)->where('user_type', 'student')->where('status', 'Pending')->get();
        return view('scholar_grades_view', [
            'scholar' => $scholar,
            'grade_details' => $grade_details,
            'notification' => $notification,
            'grades' => $grades,
        ])->with('id', $id);
    }

    public function scholar_submitted_cor($id)
    {
        $scholar = Scholar::find($id);
        $grade_details = Grade_details::where('scholar_id', $id)->get();
        $notification = Notification::where('notify_to', $id)->where('user_type', 'student')->where('status', 'Pending')->get();
        return view('scholar_submitted_cor', [
            'scholar' => $scholar,
            'grade_details' => $grade_details,
            'notification' => $notification
        ])->with('id', $id);
    }

    public function notification_process(Request $request)
    {
        $explode = explode(',', $request->input('notification_id'));

        for ($i = 0; $i < count($explode); $i++) {
            Notification::where('id', $explode[$i])
                ->update(['status' => 'completed']);
        }
    }

    public function proceed_notify_student(Request $request)
    {
        $scholar = Scholar::whereIn('id', $request->input('scholar_id'))->get();

        return view('proceed_notify_student', [
            'scholar' => $scholar,
        ]);
    }

    public function notify_student_process(Request $request)
    {
        // return $request->input();

        foreach ($request->input('scholar_id') as $key => $data) {

            Scholar::where('id', $data)
                ->update(['status' => 'On Hold']);

            $scholar = Scholar::select('email')->find($data);

            $new_notification = new Notification([
                'user_id' => Auth()->user()->id,
                'notify_to' => $data,
                'user_type' => 'student',
                'notification_name' => 'Grades',
                'notification_details' => $request->input('message'),
                'status' => 'Pending',
            ]);

            $new_notification->save();

            $subject = 'DOST NOTIFICATION';
            $messages = $request->input('message');
            Mail::to($scholar->email)->send(new Send_email($subject, $messages));
        }

        return redirect('scholar_page')->with('success', 'Notification successfully sent to students.');
    }

    public function admin_add_academ_year()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $notification = Notification::where('notify_to', Auth()->user()->id)->where('user_type', 'admin')->where('status', 'Pending')->get();

        return view('admin_add_academ_year', compact('widget'), [
            'notification' => $notification,
        ]);
    }

    public function academic_year_process(Request $request)
    {
        $new  = new Academmic_year([
            'school_year' => $request->input('academic_year'),
        ]);

        $new->save();

        return redirect('admin_add_academ_year')->with('success', 'Successfully Added New Academic Year');
    }

    public function admin_add_school()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $notification = Notification::where('notify_to', Auth()->user()->id)->where('user_type', 'admin')->where('status', 'Pending')->get();

        return view('admin_add_school', compact('widget'), [
            'notification' => $notification,
        ]);
    }

    public function add_school_process(Request $request)
    {
        $new  = new School([
            'school' => $request->input('school'),
        ]);

        $new->save();

        return redirect('admin_add_school')->with('success', 'Successfully Added New Academic Year');
    }

    public function admin_add_course()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $notification = Notification::where('notify_to', Auth()->user()->id)->where('user_type', 'admin')->where('status', 'Pending')->get();

        return view('admin_add_course', compact('widget'), [
            'notification' => $notification,
        ]);
    }

    public function add_course_process(Request $request)
    {
        $new = new Course([
            'course' => $request->input('course'),
        ]);

        $new->save();

        return redirect('admin_add_course')->with('success', 'Successfully Added New Course');
    }
}
