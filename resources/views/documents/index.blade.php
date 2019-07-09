@extends('home')


@section('content')
<script src="js/jquery.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">

  <a href="{{ route('documents.create') }}" class="btn btn-primary" style="float: right;margin-right:40px;">Ajouter document</a> </br></br>


  <main class="py-4">
    @yield('content')
    <div class="panel-body">
      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <th>Titre</th>
          <th>Description </th>
          <th>Fichier</th>
          <th >Action</th>
          <th ></th>

        </thead>
        <tbody>
          @foreach($documents as $document)
          <tr>
            <td>{{$document->document_titre }}</td>
            <td>{{$document->document_description }}</td>
            <td>{{$document->document_fichier }}</td>
            <td>
              
              <a href="{{ route('documents.edit',$document->id) }}" class="btn btn-info"> Modifer </a>
              </td>
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
    </div>


    <script type="text/javascript">
      $(document).ready(function() {
        $('#dtBasicExample').DataTable();


      });
    </script>

    <style type="text/css">
      
      table.dataTable thead .sorting:after,
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
      }
    </style>
    @endsection