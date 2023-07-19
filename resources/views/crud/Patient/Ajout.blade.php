@extends('templateback')
@section('titre')
<title>Ajout patient</title>
@endsection
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Ajouter un patient</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
          <li class="breadcrumb-item">Liste</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Veuiller remplir le formulaire</h5>

              <!-- General Form Elements -->
              <form action="{{ url('/ajoutPatient') }}" method="post">
              {{ csrf_field() }}

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10" >
                        <input type="texte" name="nom" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Date de naissance</label>
                        <div class="col-sm-10" >
                        <input type="date" name="date_naissance" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Sexe</label>
                     <div class="col-sm-10">
                    <select  name="idgenre" class="form-select" aria-label="Default select example">
                      <option value="">sexe </option>
                      @foreach ($data as $data)
                      <option value="{{ $data->idgenre }}" >{{ $data->idgenre }} {{$data->sexe}}</option>
                      @endforeach
                      </select>

                  </div>

                  <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Remboursement</label>
                        <select  name="remboursement" class="form-select" aria-label="Default select example">
                        <option value="">Remboursement </option>
                        <option value="true" >true</option>
                        <option value="false" >false</option>

                      </select>
                    </div>



                  <div class="row mb-3">
                     <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                  </div>
                </div>

            </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>


      </div>


    </section>

  </main><!-- End #main -->
