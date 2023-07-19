@extends('templateback')
@section('titre')
<title>Modifier un artiste</title>
@endsection
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Elements</h1>
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
              <h5 class="card-title">Modifier les donnees</h5>

              <!-- General Form Elements -->
              <form action="{{ url('/modifPatient') }}" method="post">
              {{ csrf_field() }}

              <input type="hidden" name="idpatient" value="{{ $data->idpatient }}">

                <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10" >
                        <input type="texte" name="nom" value="{{ $data->nom }}"  class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">date de naissance</label>
                        <div class="col-sm-10" >
                        <input type="date" id="date_naissance" name="date_naissance"  value="{{ $data->date_naissance }}" class="form-control">
                        </div>
                    </div>



                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Sexe</label>
                     <div class="col-sm-10">
                    <select  name="idgenre" class="form-select" value="{{ $data->sexe }} " aria-label="Default select example">
                      <option value=" ">sexe </option>
                      @foreach ($data1 as $data1)
                      <option value="{{ $data1->idgenre }}" >{{$data1->sexe}}</option>
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
