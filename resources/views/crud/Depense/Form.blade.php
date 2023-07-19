@extends('templatefront')
@section('titre')
<title>Ajout d'un nouveau depense</title>
@endsection
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Ajout d'un nouveau depense</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Saisie d'un nouveau depense</h5>



              <!-- General Form Elements -->
              <form action="{{ url('/enregistrer') }}" method="post">
              {{ csrf_field() }}

                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Type depense</label>
                     <div class="col-sm-10">
                            <select  name="idtypedepense" class="form-select" aria-label="Default select example">
                                <option value="">type depense </option>
                                @foreach ($data as $data)
                                <option value="{{ $data->idtypedepense }}" >{{$data->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="number" name="montant" class="form-control" id="floatingZip" placeholder="montant"  step="0.01" required/>
                            <label for="floatingZip">montant</label>
                        </div>
                    </div>
                    </div>
                    <div class="row mb-3">
                  <div class="col-md-12">
                      <div class="form-floating">
                          <input type="number" name="nombre" class="form-control" id="floatingZip" placeholder="nombre"  />
                          <label for="floatingZip">nombre </label>
                      </div>
                  </div>
                  </div>


                  <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                            <input type="number" name="jour" class="form-control" id="floatingZip" placeholder="jour"   />
                            <label for="floatingZip">jour</label>
                         </div>
                </div>
                </div>
                <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-floating">
                    <input type="number" name="annee" class="form-control" id="floatingZip" placeholder="annee"   />
                        <label for="floatingZip">annee</label>
                    </div>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="1">Janvier
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="2">Fevrier
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="3">Mars
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="mois[]"id="gridCheck1" value="4">Avril
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="5">Mai
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="6">Juin
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="7">Juillet
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="8">Aout
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="9">Septemmbre
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="10">Octobre
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="11">Novembre
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mois[]" id="gridCheck1" value="12">Decembre
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
