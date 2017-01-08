<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use DB;
use D;

class DBController extends Controller
{
    public function insert()
    {
        $insertData = $this->makeUsers();
        $r = DB::table('test')->insert($insertData);

        D::info($insertData);
        D::info($r);
        return view('layouts.app');
    }

    private function makeUsers()
    {
        $names = [
            'Neo',
            'Morpheus',
            'Tank',
            'Trinity',
            'Dozer',
            'Smith'
        ];
        $insertData = [];

        foreach($names as $name){
            array_push($insertData, [
                'username' => ucfirst($name),
                'email' => $name . '@gmail.com',
                'age' => 23,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
                'user_id' => 1,
                'password' => bcrypt("111")
            ]);
        }

        return $insertData;
    }

    public function update()
    {
        $r = DB::table('test')
            ->where('id', 1)
            ->update([
            'age' => 122
        ]);

        D::info($r);

        return view('layouts.app');
    }

    public function delete()
    {
        $r = DB::table('test')
            ->where('id', 1)
            ->delete();

        D::info($r);

        return view('layouts.app');
    }

    public function select()
    {
        $test = Test::get();

        // Test::where('id', '>', 12)->delete();

        /*$test = DB::table('test');

        $all = $test
            ->where(function($query){
                $query->where('username', 'Neo')->orWhere('age', 33);
            })
            // ->whereRaw('id = 10')
            // ->whereIn('username', ['Neo', 'Tank'])
            // ->join('users', 'user_id', '=', 'users.id')
            //->whereBetween('age', [18, 35])
            //->select('id', 'username')
            // ->whereId(2)
            // ->orWhere('username', 'Neo')
            // ->avg('age');
            ->get();

        D::info($all);*/

        return view('db.select', ['test' => $test]);
    }

    // Test -> tests
    public function store(Request $r)
    {
        $array = array_merge([
            'user_id' => 1,
        ], $r->except('_token'));

        /*$test = new Test();

        $test->username = $r->get('username');
        $test->age = $r->get('age');
        $test->password = bcrypt(111);
        $test->user_id = 1;
        $test->email = $r->get('email');

        $test->save();*/

        $test = Test::create($array);
        // ...
        // $test->save();
        // dd($test);
        //return redirect()->back();

        return view('db.select', ['test' => Test::all()]);
    }

    public function show($people)
    {
        $people = Test::find($people);
        dd($people);
    }

    public function change(Test $people)
    {
        return view('db.change', compact('people'));
    }

    public function modify(Test $people, Request $request)
    {
        $people->update($request->all());
        
        return redirect()->action('DBController@select');
    }
}
