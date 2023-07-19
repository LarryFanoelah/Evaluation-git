@extends('templateback')
@section('titre')
<title>Liste Type Recette</title>
@endsection
@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <h1>Liste Type Recette</h1>
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
                                        <th scope="col">Type Recette</th>
                                        <th scope="col">Budget</th>
                                        <th scope="col">code</th>

                                        <th scope="col"></th>
                                        <th scope="col"></th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($liste as $liste)
                                    <tr  class="table-primary text-center">
                                        <td>{{ $liste->idtyperecette}}</td>
                                        <td>{{ $liste->nom}}</td>
                                        <td>{{ $liste->type}}</td>
                                        <td>{{ number_format($liste->budget, 2, ',', ' ') }}</td>
                                        <td>{{ $liste->code}}</td>


                                        <td><a class="btn btn-success" href="{{ url('modifformTyperecette') }}/{{ $liste->idtyperecette }}">Modifier</a></td>
                                        <td><a class="btn btn-danger" href="{{ url('supprimerTyperecette') }}/{{ $liste->idtyperecette }}">Supprimer</a></td>
                                    </tr>


                                </tbody>
                          @endforeach
                            </table>
                        </div>
                        <br>
                             <a class="btn btn-primary" href="{{ url('/ajoutformTyperecette') }}" >Ajout type recette</a>
                        <br>
                </div>
        </div>


    </div>


</section>

</main>
