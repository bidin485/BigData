<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatronController extends Controller
{
  public function dashboard()
  {
      $researchAssistants = User::where('role', 'research_assistant')->get();
      return view('patron.dashboard', compact('researchAssistants'));
  }
}
