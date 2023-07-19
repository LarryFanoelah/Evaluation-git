@extends('templateback')
@section('titre')
<title>Tableau de bord</title>
@endsection
@section('content')


<main id="main" class="main">

<div class="pagetitle">
  <h1>Tableu de bord </h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
   li>
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
                    <form action="{{ url('/filtre') }}" method="post">
                            {{ csrf_field() }}
                    <div class="row mb-12">
                    <div class="row mb-4">
                        <select  name="mois" class="form-select" aria-label="Default select example">
                        <option value="">Mois </option>
                        <option value="1" >Janvier</option>
                        <option value="2" >Fevrier</option>
                        <option value="3" >Mars</option>
                        <option value="4" >avril</option>
                        <option value="5" >Mai</option>
                        <option value="6" >Juin</option>
                        <option value="7" >Juillet</option>
                        <option value="8" >Aout</option>
                        <option value="9" >Septembre</option>
                        <option value="10" >Octobre</option>
                        <option value="11" >Novembre</option>
                        <option value="12" >Decembre</option>

                      </select>

                    </div>
                    <div class="row mb-4">
                        <select  name="annee" class="form-select" aria-label="Default select example">
                        <option value="">annee </option>
                        <?php for($i=2000;$i<2050;$i++){?>

                            <option value="{{$i}}" >{{$i}}</option>
                            <?php }?>

                      </select>


                    </div>
                    <div class="row mb-4">
                    <button type="submit" class="btn btn-primary">Afficher</button>

                    </div>
                    </div>
                    </form>
                            <?php if(isset($liste)) {?>
                                <h3>Recette</h3>
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">nom</th>
                                        <th scope="col">Reel</th>
                                        <th scope="col">Budget</th>
                                        <th scope="col">Realisation</th>





                                    </tr>
                                </thead>
                                <?php
                                    $totalrecette=0;
                                    $totalbudgetrecette=0;
                                ?>
                                <tbody>
                                    @foreach($liste as $liste)
                                    <?php
                                    $totalrecette=$totalrecette+$liste->reel;
                                    $totalbudgetrecette=$totalbudgetrecette+$liste->budget;
                                    ?>
                                    <tr  class="table-primary ">
                                        <td>{{ $liste->nom}}</td>
                                        <td>{{ number_format($liste->reel, 2, ',', ' ') }}</td>
                                        <td>{{ number_format($liste->budget, 2, ',', ' ') }}</td>
                                        <td>{{ $liste->realisation}}</td>
                                    </tr>
                                    @endforeach
                                    <tr  class="table-primary ">
                                        <td></td>
                                        <td>{{ number_format($totalrecette, 2, ',', ' ') }}</td>
                                        <td>{{ number_format($totalbudgetrecette, 2, ',', ' ') }}</td>
                                        <td>{{ number_format(round($totalrecette * 100 / $totalbudgetrecette, 0), 0, ',', ' ') }}</td>
                                    </tr>
                             </tbody>
                             </table>



                             <?php }?>
                             <?php if(isset($listedepense)) {?>
                                <h3>Depense</h3>
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">nom</th>
                                        <th scope="col">Reel</th>
                                        <th scope="col">Budget</th>
                                        <th scope="col">Realisation</th>





                                    </tr>
                                </thead>
                                <?php
                                    $totaldepense=0;
                                    $totalbudgetdepense=0;
                                ?>
                                <tbody>
                                    @foreach($listedepense as $liste)
                                <?php
                                    $totaldepense=$totaldepense+$liste->reel;
                                    $totalbudgetdepense=$totalbudgetdepense+$liste->budget;
                                ?>
                                    <tr  class="table-primary ">
                                        <td>{{ $liste->nom}}</td>
                                        <td>{{ number_format($liste->reel, 2, ',', ' ') }}</td>
                                        <td>{{ number_format($liste->budget, 2, ',', ' ') }}</td>
                                        <td>{{ $liste->realisation}}</td>
                                    </tr>
                                    @endforeach
                                    <tr  class="table-primary ">
                                        <td></td>
                                        <td>{{ number_format($totaldepense, 2, ',', ' ') }}</td>
                                        <td>{{ number_format($totalbudgetdepense, 2, ',', ' ') }}</td>
                                        <td>{{ number_format(round($totaldepense * 100 / $totalbudgetdepense, 0), 0, ',', ' ') }}</td>
                                    </tr>
                             </tbody>
                            </table>
                            <?php }?>
                            <?php if(isset($listebenefice)) {?>

                                <h3>Benefice</h3>
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col"></th>
                                        <th scope="col">Reel</th>
                                        <th scope="col">Budget</th>
                                        <th scope="col">Realisation</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr  class="table-primary ">
                                        <td>Recette</td>
                                        <td>{{ number_format($listebenefice->recette, 2, ',', ' ') }}</td>
                                        <td>{{ number_format($listebenefice->budget_recette, 2, ',', ' ') }}</td>
                                        <td>{{ number_format($listebenefice->realisation_recette, 2, ',', ' ') }}</td>
                                    </tr>

                                    <tr  class="table-primary ">
                                        <td>Depense</td>
                                        <td>{{ number_format($listebenefice->depense, 2, ',', ' ') }}</td>
                                        <td>{{ number_format($listebenefice->budget_depense, 2, ',', ' ') }}</td>
                                        <td>{{ number_format($listebenefice->realisation_depense, 2, ',', ' ') }}</td>
                                    </tr>
                                    <tr  class="table-primary ">
                                        <td></td>
                                        <td>{{ number_format($listebenefice->recette - $listebenefice->depense, 2, ',', ' ') }}</td>
                                        <td>{{ number_format($listebenefice->budget_recette - $listebenefice->budget_depense, 2, ',', ' ') }}</td>
                                        <td>{{ number_format(round(($listebenefice->recette - $listebenefice->depense) * 100 / ($listebenefice->budget_recette - $listebenefice->budget_depense), 0), 0, ',', ' ') }}</td>
                                    </tr>
                             </tbody>
                            </table>
                            <?php }?>

                        </div>

                </div>
        </div>


    </div>


</section>

</main>
