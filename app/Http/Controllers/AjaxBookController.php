<?php
namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxBookController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $books = Book::all();
            return response()->json([
                'success' => true,
                'books' => $books
            ]);
        }
        return view('book.index');
    }
    public function create()
    {
        return view('book.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'code' => 'required',
            'author' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $data = $request->all();
        Book::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Success created book',
        ]);
    }
    public function edit($id)
    {
        $book = Book::where('id',$id)->first();
        return response()->json([
            'success' => true,
            'book' => $book
        ]);
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'code' => 'required',
            'author' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $book = Book::where('id',$id)->first();
        $data = $request->all();
        $book->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Success Updated book',
        ]);
    }
    public function destroy($id)
    {
        $book = Book::where('id',$id)->first();
        if($book){
            $book->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success Deleted book',
            ]);
        }
    }
}
