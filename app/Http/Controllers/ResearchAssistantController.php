<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResearchAssistantController extends Controller
{
    public function dashboard(){
        return view('research_assistant.dashboard');
      }
}
