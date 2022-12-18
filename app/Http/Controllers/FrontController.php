<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Film;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FilmStoreRequest;
use App\Http\Requests\FilmUpdateRequest;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Yajra\DataTables\Facades\DataTables;
use Session;

class FrontController extends BaseController
{
    protected $users;
    protected $films;
    protected $comments;

    public function __construct(){
        $this->users    = new User();
        $this->films    = new Film();
        $this->comments = new Comment();
    }

    public function index(Request $request){
        
        $response = Http::get('https://apifilms.webappcart.com/api/films');
           
        $jsonData = $response->json();
         
        if ($request->ajax()) {
            return Datatables::of($jsonData['data'])
            ->addIndexColumn()
            ->addColumn('action', function($row){ 
                   $btn = '<a href="'.url('films/'.$row['slug']).'" class="btn btn-info btn-sm">View</a>&nbsp;&nbsp;';
                    $btn.= '<a href="'.url('postComments/'.$row['id']).'" class="btn btn-primary btn-sm">Add Comment</a>';
                    return $btn;
            })->editColumn('release_date', function ($row) {
                return date("d-M-Y",strtotime($row['release_date']));
            })
            ->rawColumns(['name','release_date','rating','ticket_price','action'])
            ->make(true);
        }
        
        return view('films.index');
    }

    public function create(){

        return view('films.create');   
    }
    
    public function show($slug){
        
        $response = Http::get('https://apifilms.webappcart.com/api/films/'.$slug);
           
        $jsonData = $response->json();
        
        $findFilm=$jsonData['data']['film'];

        $comment=$jsonData['data']['comments'];
        $comments=array();
        
        foreach ($comment as $key => $comm) {
            $user=$this->users::where('id',$comm['user_id'])->first();
            $comm['user_id']=$user->name;
            $comments[]=$comm;
        }

        return view('films.show',compact('findFilm','comments'));
    }

    public function postComments($film){
        $is_film=Film::find($film);
        if($is_film){
            Session::put('film',$film);
            return view('films.postComments',compact('film'));
        }else{
            return Redirect('/');
        }
    }

    public function addComments(Request $request,$film){
        if(session()->get('film')==$film){
            $user=auth()->user();
            $user_id=$user->id;
            $film_id=$film;
            $this->comments->comment=$request->comment;
            $this->comments->user_id=$user_id;
            $this->comments->film_id=$film_id;
            $this->comments->save();
            return redirect()->intended('films')
                        ->withSuccess('You have added comment Successfully');
            Session::forget('film');
        }else{
            return Redirect('/');
        }
    }
}