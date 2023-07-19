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
              <form action="{{ url('/modifTyperecette') }}" method="post">
              {{ csrf_field() }}

              <input type="hidden" name="idtyperecette" value="{{ $data->idtyperecette }}">

              <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10" >
                        <input type="texte" name="nom" value = "{{ $data->nom }}" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Type depense</label>
                        <div class="col-sm-10" >
                        <input type="texte" name="type" value= "{{ $data->type }}"  class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Budget</label>
                        <div class="col-sm-10" >
                        <input type="number" name="budget" value= "{{ $data->budget }}"  class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10" >
                        <input type="texte" name="code" value= "{{ $data->code }}" class="form-control">
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
