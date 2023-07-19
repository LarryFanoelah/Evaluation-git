@extends('templatefront')
@section('titre')
<title>Liste Recette</title>
@endsection
@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <h1>Liste Recette</h1>
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
                                        <th scope="col">id recette </th>
                                        <th scope="col">id Facture</th>
                                        <th scope="col">date facture</th>
                                        <th scope="col">montant(qt*prix)</th>
                                        <th scope="col">type recette</th>
                                        <th scope="col">Nom patient</th>

                                        <th scope="col"></th>
                                        <th scope="col"></th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($liste as $liste)
                                    <tr  class="table-primary text-center">
                                        <td>{{ $liste->idrecette}}</td>
                                        <td>{{ $liste->idfacturerecette}}</td>
                                        <td>{{ \Carbon\Carbon::parse($liste->date_facture)->locale('fr_FR')->isoFormat('DD MMMM YYYY') }}</td>
                                        <td>{{ number_format($liste->montant_total, 2, ',', ' ') }}</td>
                                        <td>{{ $liste->nom_typerecette}}</td>
                                        <td>{{ $liste->nom_patient}}</td>



                                        <td><a class="btn btn-success" href="{{ url('modifformRecette') }}/{{ $liste->idrecette }}">Modifier</a></td>
                                        <td><a class="btn btn-danger" href="{{ url('supprimerRecette') }}/{{ $liste->idrecette }}">Supprimer</a></td>
                                    </tr>


                                </tbody>
                          @endforeach
                            </table>
                        </div>
                        <br>
                             <a class="btn btn-primary" href="{{ url('/ajoutformRecette') }}" >Ajouter</a>
                        <br>
                </div>
        </div>


    </div>


</section>

</main>
