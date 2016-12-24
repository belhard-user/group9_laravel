<?php

namespace App\Http\Controllers;

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
        if (\Request::isMethod('POST')) {
            dd(\Request::get('title', 'default'));
        }
        $test = DB::table('test');

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

        D::info($all);

        return view('db.select');
    }
}
