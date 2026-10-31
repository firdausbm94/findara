<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; // Baris ini wajib ada buat manggil Model

class ProjectController extends Controller
{
    public function index()
{
    $projects = Project::latest()->get();
    return view('projects', compact('projects'));
}

    public function preview($id)
    {
        $project = Project::findOrFail($id);
        
        // Cek kalau live_url kosong, kembalikan ke halaman projects
        if (empty($project->live_url)) {
            return redirect('/projects')->with('error', 'Live preview belum tersedia.');
        }

        return view('preview', compact('project'));
    }
}