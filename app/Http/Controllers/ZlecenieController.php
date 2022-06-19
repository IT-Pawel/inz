<?php

namespace App\Http\Controllers;

use App\Models\Zlecenie;
use Illuminate\Http\Request;
use App\Models\User;

class ZlecenieController extends Controller
{
    const STATUS_1 = "przyjete";
    const STATUS_2 = "w trakcie";
    const STATUS_3 = "zakonczone";


    function __construct()
    {
        $this->middleware('permission:zlecenie-list|zlecenie-create|zlecenie-edit|zlecenie-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:zlecenie-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:zlecenie-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:zlecenie-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = Zlecenie::orderBy('id', 'DESC')->paginate(5);
        return view('zlecenie.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $statusy = [
            'Przyjęte' => self::STATUS_1,
            'W trakcie' => self::STATUS_2,
            'Zakończone' => self::STATUS_3
        ];

        $users = User::get();
        $usersById = [];
        foreach ($users as $user) {
            $usersById[$user->id] = $user->name;
        }
        return view('zlecenie.create',compact('statusy', 'usersById'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'tresc' => 'string',
            'adres' => 'string',
            'miasto' => 'string',
            'kraj' => 'string',
            'status' => 'string',
            'user_id' => 'int'
        ]);

        $input = $request->all();

        $zlecenie = Zlecenie::create($input);

        return redirect()->route('zlecenie.index')
            ->with('success', 'Zlecenie created successfully');
    }


    public function show($id)
    {
        $zlecenie = Zlecenie::find($id);
        return view('zlecenie.show', compact('zlecenie'));
    }


    public function edit($id)
    {
        $zlecenie = Zlecenie::find($id);
        $statusy = [
            'Przyjęte' => self::STATUS_1,
            'W trakcie' => self::STATUS_2,
            'Zakończone' => self::STATUS_3
        ];

        $users = User::get();
        $usersById = [];
        foreach ($users as $user) {
            $usersById[$user->id] = $user->name;
        }
        return view('zlecenie.edit', compact('zlecenie', 'statusy', 'usersById'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tresc' => 'string',
            'adres' => 'string',
            'miasto' => 'string',
            'kraj' => 'string',
            'status' => 'string',
            'user_id' => 'int'
        ]);

        $input = $request->all();

        $zlecenie = Zlecenie::find($id);
        $zlecenie->update($input);;
        return redirect()->route('zlecenie.index')
            ->with('success', 'Zlecenie updated successfully');
    }

    public function destroy($id)
    {
        Zlecenie::find($id)->delete();
        return redirect()->route('zlecenie.index')
            ->with('success', 'zlecenie deleted successfully');
    }
}
