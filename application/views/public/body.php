<span class="fixed-top mx-5 my-3 md:w-fit lg:w-1/4 overscroll-auto">
    <div class="row ">
        <div class="col-sm-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1" id="searchVal">
                <span class="input-group-text" id="search">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                    </svg>
                </span>
            </div>
        </div>
        <div class="col-sm-12 overflow-y-auto" id="restSearch">
        </div>
    </div>
</span>
<div id="map" class="h-screen w-screen">
</div>

<script>
    $(document).ready(function() {
        var map;
        var tempMarker;

        navigator.geolocation.getCurrentPosition(showPosition);

        var lat = 0;
        var long = 0;

        function showPosition(position) {
            lat = position.coords.latitude;
            long = position.coords.longitude;
            start()
        }

        function search() {
            $('#restSearch').html('');
            $('#restSearch').addClass('h-screen');
            $.ajax({
                    url: '<?= base_url('Maps/ajax/search') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        search: $('#searchVal').val()
                    },
                })
                .done(function(data) {
                    $.each(data, function(i, val) {
                        var elemnt = '';
                        elemnt += '<div class="row mb-1">';
                        elemnt += '<div class="col-sm-12 w-full rounded-3xl bg-orange-100 resVal mb-1" koordinat ="' + val.koordinat + ' "><b>' + val.obj + '</b><br>' + val.ukuran + '<br>' + val.catatan + '</div> <br>';
                        elemnt += '</div>';
                        $('#restSearch').append(elemnt)
                        $('#restSearch').addClass('bg-slate-200')
                    });
                    resVal();
                })
        }

        $('#searchVal').on('keyup', function(e) {
            var code = e.key;
            if (code == 'Enter') {
                search()
            }

        })
        $('#search').click(function() {
            search()
        })

        function resVal() {
            $('.resVal').click(function() {
                $('#restSearch').removeClass('h-screen');
                var koodinat = $(this).attr('koordinat').split(',');
                if (tempMarker != null)
                    map.removeLayer(tempMarker);
                tempMarker = L.marker(koodinat).addTo(map);

                map.setView(koodinat, 18);
                $('#restSearch').html('');
                $('#restSearch').removeClass('bg-slate-200')

            })
        }

        function start() {
            var tiang = L.icon({
                iconUrl: '<?= base_url('asset/marker/tiang.svg') ?>',
                // shadowUrl: 'leaf-shadow.png',

                iconSize: [70, 95], // size of the icon
                // shadowSize: [50, 64], // size of the shadow
                // iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                // shadowAnchor: [4, 62], // the same for the shadow
                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            var odp = L.icon({
                iconUrl: '<?= base_url('asset/marker/odp.svg') ?>',
                // shadowUrl: 'leaf-shadow.png',

                iconSize: [35, 45], // size of the icon
                // shadowSize: [50, 64], // size of the shadow
                // iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                // shadowAnchor: [4, 62], // the same for the shadow
                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
            var human = L.icon({
                iconUrl: '<?= base_url('asset/marker/human.svg') ?>',
                // shadowUrl: 'leaf-shadow.png',

                iconSize: [50, 95], // size of the icon
                shadowSize: [50, 64], // size of the shadow
                iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62], // the same for the shadow
                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            });





            map = L.map('map').setView([lat, long], 13);
            map.locate({
                setView: true,
                maxZoom: 16
            });
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);
            L.marker([lat, long], {
                icon: human
            }).addTo(map);

            var data = getData();



            for (let i = 0; i < data.length; i++) {
                var koodinat = data[i].koordinat.split(",");
                if (koodinat.length != 2)
                    continue;

                if (data[i].obj.search(/tiang/i) != -1) {
                    var elemt = "<div>";
                    elemt += "<div class='font-black'>" + data[i].obj + "</div>";
                    elemt += "<div'>Ukuran :" + data[i].ukuran + "</div>";
                    elemt += "<div'>Catatan :" + data[i].catatan + "</div><br>";
                    elemt += "<div'><a href='https://www.google.com/maps/place/" + data[i].koordinat + "' target='_blank'>Google Maps</a></div>";
                    elemt += "</div>";

                    L.marker(koodinat, {
                        icon: tiang
                    }).addTo(map).bindPopup(elemt);
                }
                if (data[i].obj.search(/odp/i) != -1) {
                    var elemt = "<div>";
                    elemt += "<div class='font-black'>" + data[i].obj + "</div>";
                    elemt += "<div'>Ukuran :" + data[i].ukuran + "</div>";
                    elemt += "<div'>Catatan :" + data[i].catatan + "</div><br>";
                    elemt += "<div'><a href='https://www.google.com/maps/place/" + data[i].koordinat + "' target='_blank'>Google Maps</a></div>";
                    elemt += "</div>";
                    L.marker(koodinat, {
                        icon: odp
                    }).addTo(map).bindPopup(elemt);
                }






            }


            function onMapClick(e) {
                console.log(e.latlng)
            }

            // map.on('click', onMapClick);
        }

        function getData() {
            var data;
            $.ajax({
                    url: '<?= base_url('Maps/ajax/getData') ?>',
                    dataType: 'json',
                    async: false,
                })
                .done(function(a) {
                    data = a;
                })
            return data

        }
    });
</script>