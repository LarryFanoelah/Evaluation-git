@extends('templatefront')
@section('titre')
<title>Modifier un lieu</title>
@endsection
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Elements</h1>
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
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <form action="{{ url('/ajoutDepense') }}" method="post">
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
                        <label class="col-sm-2 col-form-label">date depense</label>
                        <div class="col-sm-10" >
                        <input type="date" name="date_depense" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">nombre</label>
                        <div class="col-sm-10" >
                        <input type="number" name="nombre" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Montant</label>
                        <div class="col-sm-10" >
                        <input type="number" name="montant" class="form-control">
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
