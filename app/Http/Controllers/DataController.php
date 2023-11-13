<?php

namespace App\Http\Controllers;

use App\Models\Forms;
use App\Models\Technologies;
// use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function showForm()
    {
        $forms = Forms::get();
        return view('forms', ['forms' => $forms]);
        // もし、Nextjsなどのフレームワークを用意して、Nextjsでのページでデータを表示したいとき、
        // return response()->json($forms);
    }

    public function showTechnology()
    {
        $technologies = Technologies::get();
        return view('technologies', ['technologies' => $technologies]);
        // もし、Nextjsなどのフレームワークを用意して、Nextjsでのページでデータを表示したいとき、
        // return response()->json($technologies);
    }

    public function showCombinedData()
    {
        // Eloquentモデルを定義せずに直接コントローラーのみでリレーションシップを実装する方法
        // $combinedData = DB::table('laravel_forms')
        //     ->join('laravel_technologies', 'laravel_forms.tech_id', '=', 'laravel_technologies.tech_id')
        //     ->select('laravel_forms.name', 'laravel_forms.age', 'laravel_technologies.proficient_language')
        //     ->get();

        // Eloquentのwith()メソッドを使用してリレーションシップを読み込み、リレーション内のカラムも選択する
        $combinedData = Forms::with(['technology' => function ($query) {
            $query->select('tech_id', 'proficient_language');
        }])
            ->select('id', 'name', 'mail', 'age', 'tech_id', 'birthplace')
            ->get();

        return view('combinedData', ['combinedData' => $combinedData]);

        // もし、Nextjsなどのフレームワークを用意して、Nextjsでのページでデータを表示したいとき、
        // return response()->json($combinedData);
    }
}