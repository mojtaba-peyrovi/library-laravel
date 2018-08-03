<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
use Validator;

class booksController extends Controller
{
    // public function __construct()
    // {
    //     $authors = Author::all();
    //     $types = Type::all();
    //
    //     View::share('authors',$authors);
    //     View::share('types',$types);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(6);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::with('author')->get();

        return view('books.create',compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //image upload
       if(Input::hasFile('image'))
       {
           $image = $request->file('image');
           $filename = $image->getClientOriginalName();
           $image_resize = Image::make($image->getRealPath());
           $image_resize->fit(260, 346);
           $image_resize->save(public_path('img/books/' .$filename));
       };

        $book = Book::create([
            'title' => ucwords(request('title')),
            'author_id' => $request->input('author'),
            'type_id' => $request->input('type'),
            'publisher_id' => 1,
            'publish_year' => request('publish_year'),
            'photo' => '/img/books/'. $filename,
            'format' => request('format'),
            'desc' => request('desc')
        ]);
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Book Added!')->success();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

         return view('books.edit',compact('book','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $book = Book::find($id);
        $book->title = $request->get('title');
        $book->author_id = $request->get('author');
        $book->type_id = $request->get('type');
        $book->publish_year = $request->get('publish_year');
        $book->photo = $request->get('photo');
        $book->desc = $request->get('desc');
        $book->save();

        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Changes Saved!')->success();

        // return view('books.show', ['book' => Book::find($id)]);
        // return redirect('/books/{book}');
        return redirect()->route('books.show',[$book]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Successfully Removed!')->success();
        return redirect('/books');
    }

    public function uploadBulk(Request $request)
    {
        // Validatior
        $validator = Validator::make($request->all(), [
            'upload-file' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('books/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        //method 1

        // //get file
        //     $upload = $request->file('upload-file');
        //     $filePath = $upload->getRealPath();
        // //open and read
        //     $file = fopen($filePath,'r'); // r means READ
        //     $header = fgetcsv($file); // reads the file
        // // dd($header);
        // $escapedHeader = [];
        //
        // //validate
        //     foreach ($header as $key => $value) {
        //         $lowerCasedHeader = strtolower($value);
        //         $escapedItem = preg_replace('/[[^a-z]]/','',$lowerCasedHeader);  // it removes any special characters from the headers exceptp a-z letters
        //         array_push($escapedHeader,$escapedItem);
        //     }
        //     //looping through columns
        //     while($columns=fgetcsv($file)) {
        //         if($columns[0]==""){
        //             continue;
        //         }
        //         //trim data
        //         foreach ($columns as $key => &$value) {
        //             $value = preg_replace('/\D/','',$value);
        //         }
        //         //dd($value);
        //         $data = array_combine($escapedHeader, $columns);
        //         dd($data);

                // //setting data type
                // foreach ($data as $key => &$value) {
                //     $value =($key=="id" || $key =="author_id")?(integer)$value: (float)$value;
                // }

            //     //table update
            //     $id = $data['id'];
            //     $author_id = $data['author_id'];
            //     $publisher_id = $data['publisher_id'];
            //     $type_id = $data['type_id'];
            //     $publish_year = $data['publish_year'];
            //     $title = $data['title'];
            //     $photo = $data['photo'];
            //     $format = $data['format'];
            //     $desc = $data['desc'];
            //     $created_at = $data['created_at'];
            //     $updated_at = $data['updated_at'];
            //
            //     $book = Book::firstOrNew(['id'=> $id]);
            //     $book->author_id = $author_id;
            //     $book->publisher_id = $publisher_id;
            //     $book->type_id = $type_id;
            //     $book->publish_year = $publish_year;
            //     $book->title = $title;
            //     $book->photo = $photo;
            //     $book->format = $format;
            //     $book->desc = $desc;
            //     $book->created_at = $created_at;
            //     $book->updated_at = $updated_at;
            //     $book->save();
            // }

        ///// method 2
        $file = $request->file('upload-file');
        $csvData = file_get_contents($file);

        $rows = array_map('str_getcsv', explode("\n", $csvData));

        $header = array_shift($rows);  // removes the header
        $rows_new = array_slice($rows, 0, sizeof($rows)-1);
        // dd($rows_new);
        foreach ($rows_new as $row){
            $row = array_combine($header, $row);

            Book::create([
                'author_id' => $row['author_id'],
                'publisher_id' => $row['publisher_id'],
                'type_id' => $row['type_id'],
                'publish_year' => $row['publish_year'],
                'title' => $row['title'],
                'photo' => $row['photo'],
                'format' => $row['format'],
                'desc' => $row['desc'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at']
            ]);
        }
        flash('Books are imported');

        return redirect('/books');

        }


    }
