<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();
        $limit = $request->input('limit', 1);
        $keyword = $request->input('keyword');

        if ($keyword) {
            $query->where('name', 'like', "%$keyword%");
        }

        $items = $query->paginate($limit);

        return view('books.index', ['items' => $items]);
    }
    public function create()
    {
        $items = Book::get();
        return view('books.create', compact('items'));
    }

    public function store(StoreBookRequest $request)
    {
        try {
            $item = new Book();
            $item->name = $request->name;
            $item->isbn = Str::random(10); // Tạo một chuỗi ngẫu nhiên với độ dài 10 ký tự
            $item->author = $request->author;
            $item->category = $request->category;
            $item->number = $request->number;
            $item->year = $request->year;
            $item->save();

            Log::info('Book stored successfully. ID: ' . $item->id);
            return redirect()->route('books.index')->with('success', __('sys.store_item_success'))->with('generatedIsbn', $item->isbn);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('books.index')->with('error', __('sys.store_item_error'));
        }
    }

    public function edit($id)
    {
        try {
            $item = Book::findOrFail($id);
            $params = [
                'item' => $item
            ];
            return view("books.edit", $params);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('books.index')->with('error', __('sys.item_not_found'));
        }
    }
    public function update(UpdateBookRequest $request, $id)
    {
        try {
            $item = Book::findOrFail($id);
            $item->name = $request->input('name');
            $item->isbn = Str::random(10);
            $item->author = $request->input('author');
            $item->category = $request->input('category');
            $item->number = $request->input('number');
            $item->year = $request->input('year');
            $item->save();
            Log::info('Book updated', ['id' => $item->id]);
            return redirect()->route('books.index')->with('success', __('sys.update_item_success'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('books.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('books.index')->with('error', __('sys.update_item_error'));
        }
    }
    public function destroy($id)
    {
        try {
            $item = Book::findOrFail($id);
            $item->delete();
            Log::info('Book message', ['context' => 'value']);
            return redirect()->route('books.index')->with('success', __('sys.destroy_item_success'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('books.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('books.index')->with('error', __('sys.destroy_item_error'));
        }
    }
}
