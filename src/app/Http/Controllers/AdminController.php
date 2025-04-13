<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class AdminController extends Controller
{
    public function logout(Request $request)
{
    Auth::logout(); // ログアウト処理
    $request->session()->invalidate(); // セッション破棄
    $request->session()->regenerateToken(); // トークン再生成

    return redirect('/login');
}
    public function search(Request $request)
{

    $query = Contact::query();

    if ($request->filled('keyword')) {
        $keyword = $request->input('keyword');
        $query->where(function ($q) use ($keyword) {
            $q->where('name', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%");
        });
    }

    if ($request->filled('gender') && $request->gender !== '全て') {
        $query->where('gender', $request->gender);
    }

    if ($request->filled('contact_type')) {
        $query->where('contact_type', $request->contact_type);
    }

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $contacts = $query->paginate(7);

    return view('admin', compact('contacts'));
}
    public function index()
{
    $contacts = Contact::paginate(7);
    return view('admin', compact('contacts'));
}
public function export(Request $request)
{
    $query = Contact::query();

    if ($request->filled('keyword')) {
        $keyword = $request->input('keyword');
        $query->where(function ($q) use ($keyword) {
            $q->where('name', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%");
        });
    }

    if ($request->filled('gender') && $request->gender !== '全て') {
        $query->where('gender', $request->gender);
    }

    if ($request->filled('contact_type')) {
        $query->where('contact_type', $request->contact_type);
    }

    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $contacts = $query->get();

    $csvData = [];
    $csvData[] = ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類', 'お問い合わせ内容'];

    foreach ($contacts as $contact) {
        $csvData[] = [
            $contact->name,
            $contact->gender,
            $contact->email,
            $contact->contact_type,
            $contact->content,
        ];
    }

    $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';

    $handle = fopen('php://temp', 'r+');
    foreach ($csvData as $line) {
        fputcsv($handle, $line);
    }
    rewind($handle);

    return response()->streamDownload(function () use ($handle) {
        fpassthru($handle);
    }, $filename, ['Content-Type' => 'text/csv']);
}
    public function destroy($id)
{
    Contact::findOrFail($id)->delete();
    return redirect()->route('admin.index')->with('success', '削除しました');
}
    public function show($id)
{
    // IDで問い合わせ内容を取得
    $contact = Contact::findOrFail($id);

    // 詳細情報を表示するためにビューを返す
    return view('admin.show', compact('contact'));
}


}
