<?php

namespace App\Http\Controllers;

use App\Models\Forms;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showIndex()
    {
        // Eloquentモデルとして定義したtechnology関数を利用
        $index = Forms::with(['technology' => function ($query) {
            $query->select('tech_id', 'proficient_language');
        }])
            ->select('id', 'name', 'mail', 'age', 'tech_id', 'birthplace')
            ->get();

        // ★以下の方法でも機能する★
        // $index = Forms::with('technology') // Eager Loadingを使用してリレーションシップを事前に読み込む
        //     ->select('laravel_forms.id', 'laravel_forms.name', 'laravel_forms.mail', 'laravel_forms.age', 'laravel_forms.tech_id', 'laravel_forms.birthplace', 'laravel_technologies.proficient_language')
        //     ->join('laravel_technologies', 'laravel_forms.tech_id', '=', 'laravel_technologies.tech_id')
        //     ->get();

        return view('/form/index', compact('index'));
        // return view('/form/index', ['index' => $index]); //これでも機能する
    }

    public function store(Request $request)
    {
        // バリデーションを行う
        $request->validate([
            'name' => 'required',
            'mail' => 'required|email',
            'age' => 'required|integer',
            'tech_id' => 'required',
        ]);

        // フォームからのデータを取得
        $name = $request->input('name');
        $mail = $request->input('mail');
        $age = $request->input('age');
        $tech_id = $request->input('tech_id');

        // 新しいモデルインスタンスを作成
        $form = new Forms; // モデル名は適切に修正してください

        // フォームからのデータをモデルに代入
        $form->name = $name;
        $form->mail = $mail;
        $form->age = $age;
        $form->tech_id = $tech_id;

        // データをデータベースに保存
        $form->save();

        // ★以下の方法でも機能する★
        // バリデーションを行う
        // $request->validate([
        //     'name' => 'required',
        //     'mail' => 'required|email',
        //     'age' => 'required|integer',
        //     'tech_id' => 'required',
        // ]);

        // // フォームからのデータを取得
        // $data = $request->only(['name', 'mail', 'age', 'tech_id']);

        // // データをデータベースに保存
        // $form = Forms::create($data);

        // // JOINを使ってデータを取得
        // $form = Forms::join('laravel_technologies', 'laravel_forms.tech_id', '=', 'laravel_technologies.tech_id')
        //     ->select('laravel_forms.name', 'laravel_forms.age', 'laravel_technologies.proficient_language')
        //     ->where('laravel_forms.id', $form->id) //保存したフォームのIDでフィルタリング
        //     ->first(); // 結果を取得

        return redirect('/form/index');
    }

    public function edit($id)
    {
        // 指定されたIDのデータを取得
        $editForm = Forms::find($id);
        return view('form.edit-form', compact('editForm')); //viewsフォルダのformフォルダのedit-form.blade.php
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mail' => 'nullable',
            'age' => 'nullable',
            'tech_id' => 'required'
        ]);

        $updateForm = Forms::find($id);

        // フォームから送信されたデータ（フィールド値）を取得して、
        // それを$updateFormというEloquentモデルインスタンスのプロパティに代入
        $updateForm->name = $request->input('name');
        $updateForm->mail = $request->input('mail');
        $updateForm->age = $request->input('age');
        $updateForm->tech_id = $request->input('tech_id');

        // ★以下のデータの取得方法も機能する★
        // $updateData = $request->only(['name', 'mail', 'age', 'tech_id']);
        // $updateForm = Forms::find($id);
        // $updateForm->fill($updateData); // フォームからのデータをモデルに代入

        $updateForm->save();

        return redirect('/form/index');
    }

    public function delete($id)
    {
        $form = Forms::find($id);
        $form->delete(); //モデルファイルで指定した論理削除が実行される（use SoftDeletes;）
        return redirect('/form/index');
    }
}