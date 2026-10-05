<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Routing\Attributes\Controllers\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jobs = Job::all()->groupBy('featured');
        return view('jobs.index', [
            'featuredJobs' => $jobs[0],
            'jobs' => $jobs[1],
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('jobs.create', [
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,name',
        ]);

        //dd($request->input('tags'));

        $fields['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create($fields);


        if ($request->has('tags')) {
            foreach ($request->input('tags') as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource. 
     */
    public function show(Job $job)
    {
        //
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    #[Authorize('update', 'job')]
    public function edit(Job $job)
    {
       
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    #[Authorize('update', 'job')] // 👈 Modern Laravel 13 Attribute
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'schedule' => ['required', 'string', 'in:Full Time,Part Time,Contract,Freelance'],
            'url' => ['required', 'url', 'max:255'],
            'featured' => ['nullable', 'boolean'],
        ]);

        $validated['featured'] = $request->has('featured');
        
        $job->update($validated);

        return redirect('/')->with('success', 'Job posting updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    #[Authorize('delete', 'job')]
    public function destroy(Job $job)
    {
        //
        $job->delete();
        return redirect()->back()->with('success', 'Job deleted successfully.');
    }
}
