<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journals = Journal::simplePaginate(6);
        return view('journals.index', compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('journals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'date|required',
            'journal' => 'required'
        ]);

        $journal = new Journal();

        $journal->name = $request->name;
        $journal->date = $request->date;
        $journal->journal = $request->journal;
        $journal->user_id = Auth::user()->id;

        $journal->save();

        return redirect()->route('journals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {
        return view('journals.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal, Request $request)
    {

        // Gate::authorize('update', $journal);
        $this->authorize('update', $journal); // Ahsen tari9a

        // if (!$request->user()->can('update', $journal)) {
        //     abort(403);
        // }

        return view('journals.edit', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journal $journal)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'date|required',
            'journal' => 'required'
        ]);

        $journal->update([
            'name' => $request->name,
            'date' => $request->date,
            'journal' => $request->journal
        ]);

        return redirect()->route('journals.show', compact('journal'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journal $journal)
    {
        $this->authorize('delete', $journal); // Ahsen tari9a
        $journal->delete();

        return redirect()->route('journals.index');
    }
}
