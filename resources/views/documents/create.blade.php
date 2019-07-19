@extends('home')


@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Creer nouveau document
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                <div class="control-group">

                    <!-- Username -->
                    {{ csrf_field() }}
                    <label class="control-label">Titre</label>
                    <div class="controls">
                        <input type="text" name="document_titre" placeholder="" class="input-xlarge">

                    </div>
                </div>

                <div class="control-group">
                    <!-- E-mail -->
                    <label class="control-label">Description</label>
                    <div class="controls">
                        <input type="text" name="document_description" placeholder="" class="input-xlarge">

                    </div>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="document_fichier"
                           aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>



                <div class="control-group">
                    <!-- Button -->

                </div>
                <button type="submit" class="btn btn-primary">Creer document</button>
            </form>
        </div>
    </div>
@endsection
