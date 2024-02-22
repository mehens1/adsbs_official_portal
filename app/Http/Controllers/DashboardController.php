<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\MarketPriceWatch;
use App\Models\Publication;
use App\Models\User;
use App\Models\Tag;
use App\Models\PublicationTag;

use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {

        // Get counts from the database
        $marketPriceWatch = MarketPriceWatch::count();
        $total_publications = Publication::count();
        $total_users = User::count();

        $marketPriceWatch_this_month = MarketPriceWatch::whereYear('created_at', '=', Carbon::now()->year)
                                    ->whereMonth('created_at', '=', Carbon::now()->month)
                                    ->count();
        $total_publications_this_month = Publication::whereYear('created_at', '=', Carbon::now()->year)
                                    ->whereMonth('created_at', '=', Carbon::now()->month)
                                    ->count();
        $total_users_this_month = User::whereYear('created_at', '=', Carbon::now()->year)
                                    ->whereMonth('created_at', '=', Carbon::now()->month)
                                    ->count();

        $data = [
            'page' => 'Dashboard',
            'prices_published' => $marketPriceWatch,
            'total_messages' => $total_publications,
            'total_publications' => $total_publications,
            'total_users' => $total_users,
            'prices_published_this_month' =>  $marketPriceWatch_this_month ,
            'unread_messages' => $total_publications_this_month,
            'total_publications_this_month' => $total_publications_this_month,
            'total_users_this_month' => $total_users_this_month
        ];


        return view('dashboard.dashboard', compact('data'));
    }

    public function addPrice()
    {

        $data = [
            'page' => 'Add Price',
        ];
        return view('dashboard.addPrice', compact('data'));
    }

    public function submitNewPrice(Request $req)
    {

        return $req;

        $data = [
            'page' => 'Add Prices',
        ];
        return view('dashboard.prices', compact('data'));
    }

    public function prices()
    {
        $prices = MarketPriceWatch::all();
        $data = [
            'page' => 'Prices',
            'prices' => $prices,
        ];
        return view('dashboard.prices', compact('data'));
    }

    public function keyStatistics()
    {
        $data = [
            'page' => 'Key Statistics'
        ];
        return view('dashboard.tables', compact('data'));
    }

    public function addPublication()
    {
        $tags = Tag::all();
        $data = [
            'page' => 'Add Publication',
            'tags' => $tags
        ];
        return view('dashboard.addPublication', compact('data'));
    }

    public function publications()
    {

        $publications = Publication::all();
        $data = [
            'page' => 'Publications',
            'publications' => $publications
        ];
        return view('dashboard.publications', compact('data'));
    }

    public function submitNewPublication(Request $req)
    {

        $validatedData = $req->validate([
            'title' => 'required|string|',
            'description' => 'required|string',
            'document' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ]);

        // Get the uploaded file

        if($req->file('document') != null){

            $file = $req->file('document');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/publications', $fileName, 'public');
        }

        $publication = new Publication();
        $publication->title = $req->title;
        $publication->description = $req->description;
        if($req->file('document') != null){ $publication->document_path = $fileName; }

        $publication->posted_by = auth()->user()->id; // Assuming you're using authentication and want to store the user ID
        $publication->save();

        $publicationId = $publication->id;

        // try {
        //     //code...
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
        foreach ($req->tags as $tagId) {
            $publicationTag = new PublicationTag();
            $publicationTag->publication_id = $publicationId;
            $publicationTag->tag_id = $tagId;
            $publicationTag->save();
        }

        return redirect()->back()->with('success', 'Publication uploaded successfully.');
        // return redirect()->back()->withErrors('Something went wrong!');
    }

    public function profile()
    {
        $data = [
            'page' => 'Profile'
        ];
        return view('dashboard.profile', compact('data'));
    }

    public function submitNewUser(Request $req)
    {

        try {

            $validatedData = $req->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
                'phone_number' => 'required|string|max:15|unique:users',
                'is_admin' => 'required|boolean',
                'other_name' => 'nullable|string|max:255',
                'unique_code' => 'nullable|string|max:255|unique:users'
            ]);

            $defaultPassword = "Password";

            $validatedData['password'] = Hash::make($defaultPassword);

            $user = User::create($validatedData);
            return redirect()->route('addUser')->with('success', 'User created successfully!');

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }

    public function addUser()
    {
        $data = [
            'page' => 'Add User'
        ];
        return view('dashboard.addUser', compact('data'));
    }

    public function users()
    {
        $users = User::all();
        $data = [
            'page' => 'Users',
            'users' => $users
        ];
        return view('dashboard.users', compact('data'));
    }

    public function viewUser(Request $req)
    {
        $id = $req->query('id');
        $user = User::findorFail($id);

        $current_user = Auth::user();

        if($current_user->id == $user->id){
            return redirect()->back()->withErrors(['That is your profile, kindly visit the Profile page to view this user!']);
        }

        $data = [
            'page' => 'View User',
            'user' => $user
        ];

        return view('dashboard.viewUser', compact('data'));
    }


    public function deactivateUser()
    {

        $data = [
            'page' => 'Deactivate User'
        ];
        return view('dashboard.users', compact('data'));
    }
}
