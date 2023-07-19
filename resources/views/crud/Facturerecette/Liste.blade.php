@extends('templatefront')
@section('titre')
<title>Liste Facture avec nom patient</title>
@endsection
@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <h1>Liste Facture avec nom patient</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
      <li class="breadcrumb-item">Liste</li>
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
                                        <th scope="col">id Facture recette</th>
                                        <th scope="col">Date facture </th>
                                        <th scope="col">nom</th>

                                        <th scope="col"></th>
                                        <th scope="col"></th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($liste as $liste)
                                    <tr  class="table-primary" >
                                        <td>{{ $liste->idfacturerecette}}</td>
                                        <td>{{ \Carbon\Carbon::parse($liste->date_facture)->locale('fr_FR')->isoFormat('DD MMMM YYYY') }}</td>
                                        <td>{{ $liste->nom}}</td>



                                        <td><a class="btn btn-success" href="{{ url('modifformFacturerecette') }}/{{ $liste->idfacturerecette }}">Modifier</a></td>
                                        <td><a class="btn btn-danger" href="{{ url('supprimerFacturerecette') }}/{{ $liste->idfacturerecette }}">Supprimer</a></td>
                                        <td><a class="btn btn-secondary" href="{{ url('pdf') }}/{{ $liste->idfacturerecette }}">pdf</a></td>

                                    </tr>


                                </tbody>
                          @endforeach
                            </table>
                        </div>
                        <br>
                             <a class="btn btn-primary" href="{{ url('/ajoutformFacturerecette') }}" >Ajouter une nouvelle facture</a>
                        <br>
                </div>
        </div>


    </div>


</section>

</main>
