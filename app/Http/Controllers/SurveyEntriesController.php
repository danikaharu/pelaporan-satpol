<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Survey;

class SurveyEntriesController extends Controller
{
    protected function survey()
    {
        return Survey::where('name', 'Survey')->first();
    }

    public function create()
    {
        return view('admin.dashboard.index', ['survey' => $this->survey()]);
    }

    public function store(Request $request)
    {
        $survey = $this->survey();

        $answers = $this->validate($request, $survey->rules);

        if ($request->file('q6') && $request->file('q6')->isValid()) {

            $filename = $request->file('q6')->hashName();
            $request->file('q6')->storeAs('uploads/photos', $filename, 'public');

            $answers['q6'] = $filename;
        }

        (new Entry())->for($survey)->fromArray($answers)->push();

        return back()->with('success', 'Terima kasih telah mengisi form');
    }
}
