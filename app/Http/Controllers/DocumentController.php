<?php
namespace App\Http\Controllers;
use App\Http\Middleware\AdminMiddleware;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Kernel;
use App\Library\Services\ValidatorService;
class DocumentController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('isAdmin',['only'=>['create']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::All();
        return view('documents.index', compact('documents'));
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
    public function store(Request $request, ValidatorService $customServiceInstance)
    {
        $request->validate([
            'document_titre' => 'required',
            'document_description' => 'required',
            'document_fichier' => 'required',
        ]);
        //call the function in service provider
        $nomfichier = $request->document_fichier->getClientOriginalName();
		$customServiceInstance->StoreDocument( $request->document_fichier);
        $document = new Document;
        $document->document_titre = $request->document_titre;
        $document->document_description = $request->document_description;
        $document->document_fichier = $nomfichier;
        $document->save();
        return redirect('/documents')->with('success', 'Document has been added');
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
    public function update(Request $request, $id, ValidatorService $customServiceInstance)
    {
        $request->validate([
            'document_titre' => 'required',
            'document_description' => 'required',
            'document_fichier' => 'required',
        ]);
        if ($request->hasFile('document_fichier')) {
            //call the function in service provider
            $customServiceInstance->StoreDocument( $request->document_fichier);
            //update parameters of document
            $nomfichier = $request->document_fichier->getClientOriginalName();
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
        // $file = $document->document_fichier;    
        $document->delete();
        //unlink(storage_path('public/upload/'.$file));
        return redirect('/documents')->with('success', 'Document has been deleted Successfully');
    }
}