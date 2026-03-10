<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $query = Document::with('user');

        if ($user) {
            switch ($user->role) {
                case 'admin':
                    $documents = $query->get();
                    break;
                case 'staff':
                    $documents = $query->where('category', 'internal')->orWhere('category', 'public')->get();
                    break;
                default:
                    $documents = $query->where('category', 'public')->get();
            }
        } else {
            $documents = $query->where('category', 'public')->get();
        }

        return view('pages.dashboard', compact('documents'));
    }
}
