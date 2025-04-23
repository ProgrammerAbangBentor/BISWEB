<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DataMaster;

class UserController extends Controller
{
    public function index(Request $request)
{
    $query = User::query();

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('role')) {
        $query->where('role', $request->role);
    }

    $users = $query->paginate(10);

    return view('pages.users.index', compact('users'));
}

    public function create()
    {
        $roles = ['admin', 'siswa', 'guru'];
        return view('pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nisn' => 'required|string',
            'role'     => 'required|in:admin,siswa,guru',
        ]);

        $dataMaster = DataMaster::where('nisn', $request->nisn)->first();
        if (!$dataMaster) {
            return back()->withErrors(['nisn' => 'NISN tidak ditemukan di data master.']);
        }

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('users.index', ['role' => $validated['role']])
                         ->with('success', 'User berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = ['admin', 'siswa', 'guru'];
        return view('pages.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'role'     => 'required|in:admin,siswa,guru',
            'nisn' => 'required|string',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index', ['role' => $validated['role']])
                         ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $role = $user->role;
        $user->delete();

        return redirect()->route('users.index', ['role' => $role])
                         ->with('success', 'User berhasil dihapus.');
    }
}
