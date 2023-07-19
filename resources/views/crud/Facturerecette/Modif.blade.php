@extends('templatefront')
@section('titre')
<title>Modifier une facture</title>
@endsection
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Modifier une facture</h1>
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
                        <form action="{{ url('/modifFacturerecette') }}" method="post">
                            {{ csrf_field() }}

                    <input type="hidden" name="idfacturerecette" value="{{ $data->idfacturerecette }}">


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Patient</label>
                         <div class="col-sm-10">
                            <select  name="idpatient" class="form-select" aria-label="Default select example">
                                <option value="">patient </option>
                                @foreach ($data1 as $data)
                                <option value="{{ $data->idpatient }}" >{{ $data->idpatient }} {{$data->nom}}</option>
                                @endforeach
                            </select>

                         </div>
                  </div>

                     <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">date facture</label>
                        <div class="col-sm-10" >
                        <input type="date" name="date_facture" class="form-control">
                        </div>
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
