<?= $this->extend('interface/layouts/structure') ?>
<?= $this->section('title') ?>
Contact
<?= $this->endSection() ?>
<?= $this->section('content') ?>


    <!-- Scroll to top -->
    <div class="scroll-to-top fixed bottom-8 right-8 w-12 h-12 bg-red-500 rounded-full flex items-center justify-center cursor-pointer shadow-lg z-40 opacity-0 transition-opacity duration-300">
    <span class="text-white text-xl">
      <i class="fas fa-arrow-up"></i>
    </span>
    </div>

    <section class="py-16 md:py-20 bg-[url('assets/interfaceimages/img_8.png')] bg-cover bg-center bg-no-repeat text-white relative">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[#17173A] bg-opacity-65"></div>

        <div class="max-w-5xl mx-auto px-4 relative z-10">
            <div class="flex justify-center ">
                <div class="text-center">
                    <h1 class="text-3xl font-bold">Contact Us</h1>
                    <p class="text-sm mt-2">
                        <span class="text-red-500"><i class="fas fa-home mr-1"></i> </span>
                        <a href="#" class="text-white hover:text-red-500 cursor-pointer">Contact Us</a> - All Donor
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-[linear-gradient(to_bottom,rgba(251,54,64,0.15),#fff)] min-h-screen flex items-center justify-center py-20">
        <section class="w-full max-w-6xl px-4">
            <!-- Heading -->
            <div class="text-center mb-8">
                <p class="text-red-500 text-md font-bold pb-1">Contact with us</p>
                <h2 class="text-3xl sm:text-3xl font-bold text-gray-900">
                    Get in Touch With Us For Any <br/>
                    <span class="font-bold">Kind of Information and Help.</span>
                </h2>
            </div>

            <!-- Main Content -->
            <div class="grid md:grid-cols-2 bg-white  rounded-lg shadow-md overflow-hidden">

                <!-- Left Side -->
                <div class="bg-[#0d0a36] text-white p-8 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-6">Reach Us</h3>
                        <ul class="space-y-5 text-sm">
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-location-dot text-white text-xl mt-1"></i>
                                <span>Mumtaz Market, Gujranwala.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-envelope text-white text-xl mt-1"></i>
                                <span>bloodbank@innovate.com.pk</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-phone text-white text-xl mt-1"></i>
                                <span>+92-312-2879500</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Google Map -->
                    <div class="mt-6 h-40">
                        <div id="map"></div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="p-9">
                    <form class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
                                <input type="text" placeholder="Full name" class="w-full border rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-red-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                <input type="email" placeholder="Email address" class="w-full border rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-red-500" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subject *</label>
                            <input type="text" placeholder="Enter Subject" class="w-full border rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-red-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Message *</label>
                            <textarea placeholder="Your message" rows="5" class="w-full border rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-red-500" required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-md font-medium hover:bg-red-600">Submit Now</button>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <style>
        /* grayscale map style */
        #map {
            filter: grayscale(100%);
            height: 100%;
            width: 100%;
            border-radius: 0.5rem; /* Tailwind rounded-md */
        }
    </style>

    <!-- Google Maps API Script -->
    <script>
        function initMap() {
            const location = { lat: 32.18136, lng: 74.18453 }; // 32°10'52.9"N 74°11'04.3"E

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: location,
                mapTypeControl: true,          // Map / Satellite toggle
                streetViewControl: true,       // Yellow man (Street View)
                zoomControl: true,             // Zoom in/out (+/-)
                fullscreenControl: true        // Fullscreen option
            });

            // Add marker
            new google.maps.Marker({
                position: location,
                map: map,
                title: "Mumtaz Market, Gujranwala"
            });
        }
    </script>
<?php $googleMapsKey = getenv('GOOGLE_MAPS_API_KEY'); ?>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= $googleMapsKey ?>&callback=initMap"></script>


<?= $this->endSection() ?>