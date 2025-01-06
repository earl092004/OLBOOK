<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    // Show admin users
    public function adminIndex()
{
    $admins = User::where('role', 'admin')->get();
    return view('admin_users', compact('admins'));
}

// Add functionality to edit/delete admins
public function editAdmin($id)
{
    $admin = User::findOrFail($id);
    return view('edit_admin', compact('admin'));
}

public function updateAdmin(Request $request, $id)
{
    $admin = User::findOrFail($id);
    $admin->update($request->only(['name', 'email', 'subscription_type']));
    return redirect()->route('admin_users.index')->with('success', 'Admin updated successfully.');
}

public function destroyAdmin($id)
{
    User::destroy($id);
    return redirect()->route('admin_users.index')->with('success', 'Admin deleted successfully.');
}

    // Show all books
    public function booksIndex()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }

    // Show the user creation form
    public function create()
    {
        return view('create_user');
    }

    // Store a new user
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'subscription_type' => 'required|in:regular,silver,premium',
        'password' => 'required|confirmed|min:8',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'subscription_type' => $request->subscription_type,
        'password' => Hash::make($request->password),
        'role' => 'user', // Set a default role here
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully.');
}

    // Display all users in the home view
    public function loadAllUsers()
    {
        $all_users = User::all();
        return view('home', compact('all_users'));
    }

    // Display posts (if required)
    public function loadAllPost()
    {
        $all_post = User::all(); // This seems incorrect; clarify what posts refer to.
        return view('post', ['all_users' => $all_post]);
    }

    // Store a post (placeholder method)
    public function storePost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'Details' => 'required|string', // Validate this field correctly.
        ]);

        // Assuming 'Post' model exists.
        // Post::create([
        //     'name' => $request['name'],
        //     'details' => $request['Details'],
        // ]);

        return redirect()->route('post')->with('success', 'Post added successfully.');
    }

//admin user CRUD




}
