@include('layout.head')
@include('layout.sidebar')

@yield('container')


    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
      <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">Kelompok 4 Kelas D<span class="d-none d-sm-inline-block">, Sistem Informasi Geografi</span></span><span class="float-md-end d-none d-md-block"><i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-analytics.min.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-invoice-list.min.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
        </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.2.0/firebase-app.js";
        import { getDatabase, ref, set, onValue } from "https://www.gstatic.com/firebasejs/9.2.0/firebase-database.js";

        // Your web app's Firebase configuration
        const firebaseConfig = {
            const firebaseConfig = {
            apiKey: "AIzaSyDf0bYRqPK8Sb1Fjpr8x45pqLT7JNXbLwc",
            authDomain: "praktikumsig-2b4b1.firebaseapp.com",
            databaseURL: "https://praktikumsig-2b4b1-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "praktikumsig-2b4b1",
            storageBucket: "praktikumsig-2b4b1.appspot.com",
            messagingSenderId: "836740190661",
            appId: "1:836740190661:web:3a2014a90319b60cc6bbac"
        };
    };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);

        // create map
        const map = L.map('map').setView([-6.6061381, 106.801851], 12);

        // create basemap
        const basemap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        basemap.addTo(map);

        // add bogor polygon
        const bogorGeojson = await fetch("https://raw.githubusercontent.com/MAROON-LABKOM/script-praktikum/master/gis/bogor.geojson");
        const geojsonBody = await bogorGeojson.json();
        L.geoJson(geojsonBody).addTo(map);

        // Get a reference to the database service
        const db = getDatabase(app);
        const sensorRef = ref(db, 'WEBGIS');

        // add marker from realtime iot devices
        function addToMap(data) {
            L.marker([data.latitude, data.longitude])
                .addTo(map)
                .bindPopup(`<b>${data.nama} - ${data.kelas}</b><br>Suhu: ${data.suhu}<br>Kelembaban: ${data.kelembaban}<br>Terakhir Diperbaharui:<br>${data.diperbaharui}`);
        }

        function addToTable(data) {
            const findRow = document.querySelector(`tr[nama="${data.nama}"]`);
            const row = findRow ?? document.createElement('tr');
            row.setAttribute("nama", data.nama);
            row.innerHTML = `
                <td align="center" >${data.nama}</td>
                <td align="center" >${data.kelas}</td>
                <td align="center" >${data.suhu}</td>
                <td align="center" >${data.kelembaban}</td>
                <td align="center" >${data.latitude}</td>
                <td align="center" >${data.longitude}</td>
                <td align="center" >${data.diperbaharui}</td>
            `;

            if (!findRow) {
                const table = document.getElementById('sensor');
                const tbody = table.querySelector('tbody');
                tbody.appendChild(row);
            }

        }

        onValue(sensorRef, (snapshot) => {
            if (!snapshot.exists()) return;
            snapshot.forEach(function (data) {
                const val = data.val();
                addToMap(val);
                addToTable(val);
            });
        });

    </script>

  </body>
  <!-- END: Body-->
</html>
