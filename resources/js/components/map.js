const mapWrapper = document.querySelector("#map");
if (mapWrapper) {
    const long = mapWrapper.dataset.long;
    const lat = mapWrapper.dataset.lat;

    mapboxgl.accessToken =
        "pk.eyJ1IjoiYXNlcmxpeCIsImEiOiJjazd2dXM4N3UxY2tyM29tcmduZDY1anppIn0.rtIl55V5CC6sPEY0EvAxjA";
    const map = new mapboxgl.Map({
        container: "map",
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: "mapbox://styles/mapbox/streets-v12",
        center: [long, lat],
        zoom: 12,
    });

    // Create a default Marker and add it to the map.
    const marker1 = new mapboxgl.Marker().setLngLat([long, lat]).addTo(map);

    // Create a default Marker, colored black, rotated 45 degrees.
    // const marker2 = new mapboxgl.Marker({ color: "black", rotation: 45 })
    //     .setLngLat([12.65147, 55.608166])
    //     .addTo(map);
}
