@extends('templatefront')
@section('titre')
<title>Liste  Depense</title>
@endsection
@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <h1>Liste  depense</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">General</li>
    </ol>
  </nav>
</div>

{{ csrf_field() }}
@if(session('suppression'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ session('suppression') }}
    </div>
 @endif

 @if(session('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ session('success') }}
    </div>
 @endif

 @if(session('modification'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ session('modification') }}
    </div>
 @endif

<section class="section">
  <div class="row">
        <div class="col-lg-6">
                <div class="card-body">
                    <div class="card" style="width: 140vh;">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id </th>
                                        <th scope="col">nom</th>
                                        <th scope="col">Type </th>
                                        <th scope="col">Date depense</th>
                                        <th scope="col">nombre</th>
                                        <th scope="col">montant</th>
                                        <th scope="col">montant total</th>

                                        <th scope="col"></th>
                                        <th scope="col"></th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($liste as $liste)
                                    <tr  class="table-primary text-center">
                                        <td>{{ $liste->iddepense}}</td>
                                        <td>{{ $liste->nom_typedepense}}</td>
                                        <td>{{ $liste->type}}</td>
                                        <td>{{ $liste->date_depense}}</td>
                                        <td>{{ $liste->nombre}}</td>
                                        <td>{{ $liste->montant}}</td>
                                        <td>{{ $liste->montant_total}}</td>


                                        <td><a class="btn btn-success" href="{{ url('modifformDepense') }}/{{ $liste->iddepense }}">Modifier</a></td>
                                        <td><a class="btn btn-danger" href="{{ url('supprimerDepense') }}/{{ $liste->iddepense }}">Supprimer</a></td>
                                    </tr>


                                </tbody>
                          @endforeach
                            </table>
                        </div>
                        <form method="POST" action="{{ route('import.csv') }}" enctype="multipart/form-data">
                            @csrf
                          <div>  <input class="form-control" type="file" name="csv">  </div>
                          <div>   <button class="btn btn-success"  type="submit">Importer</button> </div>
                          <div>
                        </form>
                        <br>
                             <a class="btn btn-primary" href="{{ url('/ajoutformDepense') }}" >Ajouter</a>
                        <br>
                </div>
        </div>


    </div>


</section>

</main>
