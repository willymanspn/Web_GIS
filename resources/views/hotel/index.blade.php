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

        <!-- Basic table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <table class="datatables-basic table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Hotel</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Alamat</th>
              <th>Kecamatan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ( $hotels as $hotel )
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $hotel->nama_hotel }}</td>
                  <td>{{ $hotel->x }}</td>
                  <td>{{ $hotel->y }}</td>
                  <td>{{ $hotel->alamat }}</td>
                  <td>{{ $hotel->kecamatan }}</td>
                  <td>Action</td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!--/ Basic table -->

        </div>
      </div>
    </div>
    <!-- END: Content-->

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <script type="text/javascript">

    var map = L.map('map').setView([-6.6061381, 106.801851], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
        }).addTo(map);

	var LeafIcon = L.Icon.extend({
		options: {
			iconSize: [40, 40],

		}
	});

	var greenIcon = new LeafIcon({iconUrl: 'hotel.png'});

	L.marker([-6.666841971,106.83332], {icon: greenIcon}).bindPopup('AMANUBA Hotel & Resort, Rancamaya Bogor').addTo(map);
	L.marker([-6.6588887,106.8210068], {icon: greenIcon}).bindPopup('R Hotel Rancamaya').addTo(map);
	L.marker([-6.6380567,106.8297721], {icon: greenIcon}).bindPopup('Agria Hotel Bogor').addTo(map);
	L.marker([-6.6184543,106.8112763], {icon: greenIcon}).bindPopup('Space Hotel By Papaho').addTo(map);
	L.marker([-6.6076432,106.8081493], {icon: greenIcon}).bindPopup('Amaris Hotel Pakuan - Bogor').addTo(map);
	L.marker([-6.6013352,106.7920015], {icon: greenIcon}).bindPopup('Sahira Butik Hotel').addTo(map);
	L.marker([-6.6052573,106.8105522], {icon: greenIcon}).bindPopup('IZI Hotel').addTo(map);
	L.marker([-6.6647326,106.8419877], {icon: greenIcon}).bindPopup('Bakom INN Syariah').addTo(map);
	L.marker([-6.6534671,106.8419131], {icon: greenIcon}).bindPopup('OYO 3317 Maju Jaya Homestay Syariah').addTo(map);
	L.marker([-6.6026984,106.792844], {icon: greenIcon}).bindPopup('Royal Hotel Bogor').addTo(map);
	L.marker([-6.5984171,106.8070828], {icon: greenIcon}).bindPopup('Bigland Hotel Intl and Convention Hall').addTo(map);
	L.marker([-6.5936456,106.8022753], {icon: greenIcon}).bindPopup('Savero Style Hotel Bogor').addTo(map);
	L.marker([-6.5812267,106.7741892], {icon: greenIcon}).bindPopup('Hotel Braja Mustika').addTo(map);
	L.marker([-6.5946137,106.7919503], {icon: greenIcon}).bindPopup('Hotel Salak The Heritage').addTo(map);

    </script>
@endsection
