@extends('home')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="{{ route('documents.update', $document->id) }}" enctype="multipart/form-data">
    @method('PATCH')
        @csrf
      <div class="control-group">



<label class="control-label" >Titre</label>
<div class="controls">
    <input type="text"  name="document_titre" placeholder="" class="input-xlarge" value={{ $document->document_titre }}>
    
</div>
</div>

<div class="control-group">
<!-- E-mail -->
<label class="control-label" >Description</label>
<div class="controls">
    <input type="text"  name="document_description" placeholder="" class="input-xlarge" value={{ $document->document_description }}>
    
</div>
</div>
<div class="custom-file">
<input type="file" class="custom-file-input" name="document_fichier" aria-describedby="inputGroupFileAddon01">
<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
<div class="invalid-feedback">Example invalid custom file feedback</div>
</div>


</br>

<div class="control-group">
<!-- Button -->

</div>
          <button type="submit" class="btn btn-primary">Modifier document</button>
      </form>
  </div>
</div>
@endsection