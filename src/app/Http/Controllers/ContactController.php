<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
    $validated = $request->validated();


    $category = Category::find($validated['category_id']);
    $categoryName = $category ? $category->content : '未選択';

    $validated['building'] = $validated['building'] ?? '未入力';

    $request->session()->put('inputs', $validated);

    return view('confirm', [
        'inputs' => $validated,
        'categoryName' => $categoryName
    ]);
    }



    public function send(Request $request)
    {
        $inputs = $request->all();

        if ($request->input('action') === 'back') {
        return redirect()->route('contact.create')->withInput($request->session()->get('inputs'));
        }


        $tel1 = $inputs['tel1'] ?? '';
        $tel2 = $inputs['tel2'] ?? '';
        $tel3 = $inputs['tel3'] ?? '';

        $tel = $tel1 . '-' . $tel2 . '-' . $tel3;

        Contact::create([
            'last_name'     => $inputs['last_name'],
            'first_name'    => $inputs['first_name'],
            'gender'        => $inputs['gender'],
            'email'         => $inputs['email'],
            'tel'           => $tel,
            'address'       => $inputs['address'],
            'building'      => $inputs['building'],
            'category_id'   => $inputs['category_id'],
            'detail'        => $inputs['detail'],
        ]);

        return redirect()->route('thanks');
    }

    public function form(Request $request)
    {

    $inputs = $request->session()->get('inputs', []);

    return view('contact.form', compact('inputs'));
    }

    public function thanks()
    {
        return view('thanks');
    }
}