<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'technologies' => 'array',
            'technologies.*' => 'exists:technologies,id',
            'image' => 'nullable|image|max:1024',
        ]);

        $data['slug'] = Str::slug($data['name']);

        if (isset($data['image'])) {
            $imgPath = Storage::put('uploads', $data['image']);
            $data['image'] = $imgPath;
        };
        

        $project = Project::create($data);
        $project->technologies()->attach($request->technologies);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo');
    }

    public function show(Project $project)
    {
        $project->load('type', 'technologies');
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
            'technologies' => 'array',
            'technologies.*' => 'exists:technologies,id',
            'image' => 'nullable|image|max:1024',
            'remove_image' => 'nullable'
        ]);

        $data['slug'] = Str::slug($data['name']);

        if (isset($data['image'])) {

            if ($project->image) {
                Storage::delete($project->image);
                $project->image = null;
            }
            $imgPath = Storage::put('uploads', $data['image']);
            $data['image'] = $imgPath;
        }
        else if (isset($data['remove_image']) && $project->image) {
            Storage::delete($project->image);
            $project->image = null;
        }

        $project->update($data);
        $project->technologies()->sync($request->technologies);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo');
    }

    public function destroy(Project $project)
    {
        
        if ($project->image) {
            Storage::delete($project->image);
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo');
    }
}
