<?php

namespace App\Http\Controllers;
use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::All();

        return view('documents.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        if($request->hasFile('document_fichier')){
    		
            $nomfichier = $request->document_fichier->getClientOriginalName();	
            $request->document_fichier->storeAs('public/upload',$nomfichier);	
            $document = new Document;
            $document->document_titre = $request->document_titre;
            $document->document_description = $request->document_description;
            $document->document_fichier = $nomfichier;
            $document->save();
            echo 'succed';
            return redirect('/documents')->with('success', 'Document has been added'); echo 'succes';
                }
                echo 'echec';

          

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);

        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'document_titre'=>'required',
            'document_description'=> 'required',
            
          ]);
    
          if($request->hasFile('document_fichier')){
    		
            $nomfichier = $request->document_fichier->getClientOriginalName();	
            $request->document_fichier->storeAs('public/upload',$nomfichier);	
            $document = Document::find($id);
            $document->document_titre = $request->document_titre;
            $document->document_description = $request->document_description;
            $document->document_fichier = $nomfichier;
            $document->save();
           
            return redirect('/documents')->with('success', 'Document has been updated'); 
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();

        return redirect('/documents')->with('success', 'Document has been deleted Successfully');
    }
}
