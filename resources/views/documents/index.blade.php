@extends('home')


@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  
  <a href="{{ route('documents.create') }}" class="btn btn-primary">Ajouter document</a> 
  
  
</button>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead> 
                        <th>Titre</th>
                        <th>Description </th>
                        <th>Fichier</th>
                        <th colspan="1">Action</th>

                    </thead>
    <tbody>
    @foreach($documents as $document)
               <tr>
                <td>{{$document->document_titre }}</td>
                <td>{{$document->document_description }}</td>
                <td>{{$document->document_fichier }}</td>
                <td>
                <a href="" class="btn btn-primary">Afficher</a> 
                <a href="{{ route('documents.edit',$document->id) }}" class="btn btn-info"> Modifer </a> </td>
               <td>
               <form action="{{ route('documents.destroy', $document->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
                 
                 </td>
                </tr>
                @endforeach 
    </tbody>
  </table>
<div>

<script type="text/javascript">
    
$(document).ready(function () {
$('#dtBasicExample').DataTable();


});

</script>

<style type="text/css">table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
  bottom: .5em;
}</style>
@endsection

