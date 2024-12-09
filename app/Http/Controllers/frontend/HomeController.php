<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use App\Models\Category;
use App\Models\AboutUs;
use App\Models\Application;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Course;
use App\Models\CustomerOpinion;
use App\Models\OurEvent;
use App\Models\Team;


class HomeController extends Controller
{
    public function index()
    {
        $homepage = Homepage::first(); // Fetch the first row (you can adjust this logic if necessary)
        $categories = Category::all();
        $aboutUs = AboutUs::first();
        $clients = AboutUs::all();
        $stats = AboutUs::all();
        $service = Service::latest()->first();
        $courses = Course::all();
        $opinions = CustomerOpinion::all();
        $event = OurEvent::first();
        $applications = Application::all();
        $teamMembers = Team::all();
        $contacts = Contact::all();
        return view('frontend.index', compact('homepage' ,'categories','aboutUs','clients','stats','service','courses','opinions','event','applications','teamMembers', 'contacts'));
        
    }
}
