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

class FilmController extends BaseController
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

        $films=$this->films->all();

        return $this->sendData($films);
    }

    public function store(FilmStoreRequest $request){

        $image_path = $request->file('photo')->store('image', 'public');
        
        $data=$request->all();
        
        unset($data['photo']);$data['photo']=$image_path;
        
        $data['slug']=strtolower(str_replace(" ","-",$data['name']));
            
        $film = $this->films::create($data);
        
        $success['message']="Film has been stored!";
        
        return $this->sendData($success);
    }
    
    public function show($slug){
        return $this->sendData($slug);
    }
    public function update(FilmUpdateRequest $request,$film_id){

        $film=$this->films->find($film_id);

        if($film){

            $film->update($request->all());

            $success['message']="Film has been updated!";
                    
            return $this->sendData($success);

        }else{

            $error['message']="Film not found!";
            
            return $this->sendError('Invalid attempt!', $error);
        }
    }

    public function destroy($film_id){

        $film=$this->films->find($film_id);

        if($film){

            $film->delete();
            
            $success['message']="Film has been removed!";

            return $this->sendData($success);

        }else{

            $error['message']="Film not found!";

            return $this->sendError('Invalid attempt!', $error);
        }
                
    }
}