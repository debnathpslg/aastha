<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationBoard;
use Illuminate\Validation\Rule;

class EducationBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadCrumbProps = [
            'page_name' => "Education Board",
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Admin',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Master',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Edu. Board',
                ],
            ],
        ];

        $boards = EducationBoard::select(
            'id',
            'name',
            'is_system',
            'deleted_at',
        )->withTrashed()->get();

        return view('EducationBoard.index', compact('breadCrumbProps', 'boards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $breadCrumbProps = [
            'page_name' => "Education Board",
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Admin',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Master',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Edu. Board',
                    'url' => route('boards.index'),
                ],
                [
                    'label' => 'New',
                ],
            ],
        ];

        return view('EducationBoard.create', compact('breadCrumbProps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name'      => 'required|string|max:100|unique:education_boards,name',
        ]);

        EducationBoard::create([
            'name'       => $validated['name'],
            'is_system'  => false,
            'created_by' => $currentUser->employee_id,
        ]);

        return redirect()
            ->route('boards.index')
            ->with('success', "Education boad created successfully...");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, EducationBoard $board)
    {
        $breadCrumbProps = [
            'page_name' => "Education Board",
            'bread_crumbs' => [
                [
                    'label' => 'Home',
                    'url' => route('home'),
                ],
                [
                    'label' => 'Admin',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Master',
                    // 'url' => route('home'),
                ],
                [
                    'label' => 'Edu. Board',
                    'url' => route('boards.index'),
                ],
                [
                    'label' => 'Info',
                ],
            ],
        ];

        return view('EducationBoard.show', compact('board', 'breadCrumbProps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EducationBoard $board)
    {
        if ($board->is_system && $board->trashed())
            return redirect()
                ->route('standards.index')
                ->with("error", "System/Deleted boards cannot be edited...");
        else {
            $breadCrumbProps = [
                'page_name' => "Education Board",
                'bread_crumbs' => [
                    [
                        'label' => 'Home',
                        'url' => route('home'),
                    ],
                    [
                        'label' => 'Admin',
                        // 'url' => route('home'),
                    ],
                    [
                        'label' => 'Master',
                        // 'url' => route('home'),
                    ],
                    [
                        'label' => 'Edu. Board',
                        'url' => route('boards.index'),
                    ],
                    [
                        'label' => 'Edit',
                    ],
                ],
            ];

            return view('EducationBoard.edit', compact('board', 'breadCrumbProps'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EducationBoard $board)
    {
        $currentUser = $request->user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('languages', 'name')
                    ->ignore($board->id)
                    ->whereNull('deleted_at'),
            ],
        ]);

        $validated['updated_by'] = $currentUser->employee_id;
        $board->update($validated);

        return redirect()
            ->route('standards.index')
            ->with('success', 'Education board updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, EducationBoard $board)
    {
        if ($board->is_system)
            return redirect()
                ->route('boards.index')
                ->with("error", "System boards cannot be deleted...");
        else {
            $board->delete();

            return redirect()
                ->route('boards.index')
                ->with("success", "Education board deleted successfully...");
        }
    }

    public function restore(Request $request, $id)
    {
        $board = EducationBoard::withTrashed()->findOrFail($id);

        $board->restore();

        return redirect()
            ->route('boards.index')
            ->with("success", "Education board restored successfully...");
    }
}
