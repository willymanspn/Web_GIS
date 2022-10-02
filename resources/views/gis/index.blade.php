@extends('layout.main')

@section('container')

 <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

        <div id="map" style="height: 500px;"></div>
        <div class="m-2">
            <table class="table table-striped table-striped table-bordered" id="sensor">
                <thead>
                    <tr align="center" >
                            <th>Lokasi</th>
                            <th>Kelas</th>
                            <th>Suhu</th>
                            <th>Kelembaban</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Terakhir diperbaharui</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

        </div>
      </div>
    </div>
    <!-- END: Content-->

@endsection

