<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Header\Header,
	Modules\OpenHour\OpenHour,
	Modules\Department\Department,
    Modules\Service\Service,
	Modules\Service\SubService,
    Modules\About\About,
    Modules\Contact\Message,
    Modules\Doctor\DoctorSub,
    Modules\Post\Post,
    Modules\Category\Category,
    Modules\Appointment\Appointment,
    Modules\Hasci\HasciHeader,
    Modules\Hasci\HasciBody,
    Modules\Hasci\HasciLink,
    Modules\Hasci\HasciMetode
};

class WelcomeController extends Controller
{

    public function index()
    {
    	$header = Header::all()->take(1);
    	$open_hour = OpenHour::all()->take(3);
    	$department = Department::all()->take(5);
        $doctor = DoctorSub::all()->take(4);
        return view('frontend.pages.home.index', compact('header', 'open_hour', 'department', 'doctor'));
    }

    public function index_hasci()
    {
        $header = HasciHeader::all()->take(1);
        $body = HasciBody::all()->take(3);
        $link = HasciLink::all()->take(3);
        $metode = HasciMetode::all();
        return view('frontend.pages.hasci.index', compact('header', 'body', 'link', 'metode'));
    }

    public function index_dept()
    {
    	$department = Department::all()->take(5);
        $service = Service::all()->take(1);
        return view('frontend.pages.department.index', compact('department', 'service'));
    }

    public function index_dept_detail($id)
    {
        $dept_list = Department::all()->take(5);
        $department = Department::findOrFail($id);
        $dept_service = SubService::where('dept_id', $department->id)->get();
        return view('frontend.pages.department.detail', compact('department', 'dept_list', 'dept_service'));
    }

    public function index_about()
    {
        $about = About::all()->take(1);
        return view('frontend.pages.about.index', compact('about'));
    }

    public function index_contact()
    {
        return view('frontend.pages.contact.index');
    }

    public function index_contact_send(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $contact = new Message();
        $data = array(
            $contact->name = $request->input('name'),
            $contact->email = $request->input('email'),
            $contact->message = $request->input('message')
        );
        $contact->save($data);
        return redirect()->back()->with('success','Message has been send');

    }

    public function index_appointment()
    {
        $open_hour = OpenHour::all()->take(3);
        return view('frontend.pages.appointment.index', compact('open_hour'));
    }

    public function index_appointment_register($id)
    {
        $doctor = DoctorSub::findOrFail($id);
        return view('frontend.pages.appointment.register', compact('doctor'));
    }

    public function index_appointment_send(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $appointment = new Appointment();
        $data = array(
            $appointment->doctor_id = $request->input('doctor_id'),
            $appointment->name = $request->input('name'),
            $appointment->email = $request->input('email'),
            $appointment->message = $request->input('message'),
            $appointment->scheduled_time = $request->input('scheduled_time'),
        );
        $appointment->save($data);
        return redirect()->back()->with('success','Appointment has been send');

    }

    public function index_blog(Request $request)
    {
        $category = Category::all()->take(5);
        $blog = Post::all()->take(5);
        $search = $request->input('q');
        if ($search) {
        $blog = Post::search($request->input('q'))
                 ->with('user', 'likes')
                 ->withCount('comments', 'likes')
                 ->latest()
                 ->paginate(20);
        }
        return view('frontend.pages.blog.index', compact('blog', 'category'));
    }

    public function index_blog_list($id)
    {
        $category = Category::all()->take(5);
        $blog = Post::where('category_id', $id)->get();

        return view('frontend.pages.blog.list', compact('blog', 'category'));
    }

    public function index_blog_detail($id, Request $request, Post $post)
    {
        $category = Category::all()->take(5);
        $blog = Post::findOrFail($id);
        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();

        return view('frontend.pages.blog.detail', compact('blog', 'post', 'category'));
    }

    public function index_gallery()
    {
        return view('frontend.pages.gallery.index');
    }
}
