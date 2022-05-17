<style>
    
.ftco-section {
  padding: 1em 0; }

.ftco-no-pt {
  padding-top: 0; }

.ftco-no-pb {
  padding-bottom: 0; }

.heading-section {
  font-size: 28px;
  color: #000; }


.table {
  min-width: 500px !important;
  width: 80% !important;
  margin-left: 10%;
  background: #fff;
  -webkit-box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
  -moz-box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
  box-shadow: 0px 5px 12px -12px rgba(0, 0, 0, 0.29);
  text-align: center; }
  .table thead.thead-primary {
    background: #e47575; }
  .table thead th {
    border: none;
    padding: 30px;
    font-size: 14px;
    color: #fff; }
  .table tbody tr {
    margin-bottom: 5px; }
  .table tbody th, .table tbody td {
    border: none;
    padding: 15px;
    font-size: 14px;
    background: #fff;
    vertical-align: middle;
    border-bottom: 2px solid #f8f9fd; }
  .table tbody th.scope {
    background: #e8ebf8;
    border-bottom: 2px solid #e0e5f6; }
  @media (min-width: 768px) {
    .table tbody td:nth-child(odd) {
      background: #f4f6fc;
      border-bottom: 2px solid #eceffa; } }

</style>
@extends('layouts.main')

@section('content')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="row">
                  <div class="col-lg-6 align-self-center text-light">
                      <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                          <div class="row">
                              <div class="col-lg-12">
                                  <h2 class="text-light">Bienvenue sur le site officiel de la commune de Menzel Abderrahmen</h2>
                                  <p class="text-light">
                                      Menzel Abderrahmane (arabe : منزل عبد الرحمان) est une ville située à une soixantaine de kilomètres au nord de Tunis, sur la rive nord du lac de Bizerte. Elle fait partie de l'agglomération de Bizerte
                                      dont elle n'est séparée que de quelques kilomètres...
                                  </p>
                              </div>
                              <div class="col-lg-12">
                                
                                  <div class="col-lg-12">
                                      <div class="white-button first-button scroll-to-section">
                                          <a href="#contact">Plus d'information<i class="fab fa-apple"></i></a>
                                      </div>
                                      <div class="white-button scroll-to-section">
                                          <a href="#contact">contact <i class="fab fa-google-play"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                          <img src="{{ asset('assets/images/slider-dec.png') }}" alt="" />
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Documents administratifs</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center mb-4">Télecharger le document que vous avez besoin</h4>
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>Nom document</th>
                                    <th>Date de publication</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doc as $d)
                                    <tr>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->date }}</td>
                                        <td>
                                            @if ($d->file)
                                                <p class="text-primary d-inline p-2">
                                                    <a class="btn btn-primary btn-sm mt-3"
                                                        href="{{ asset('storage') }}/{{ $d->file }}"
                                                        target="_blank">Preview
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </p>
                                            @else
                                                <span class="badge badge-danger">Not attached</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
