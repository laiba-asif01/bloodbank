<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?= $this->extend('interface/layouts/structure') ?>
<?= $this->section('title') ?>
    Home
<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <section class="relative text-white  flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="<?= base_url('assets/interfaceimages/img_2.png') ?>"
                 alt="Footer Background"
                 class="w-full h-full object-cover">
        </div>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 z-10 bg-gradient-to-t from-[rgba(23,23,58,0.98)] to-[rgba(23,23,58,0.45)]"></div>

        <!-- Content -->
        <div class="relative z-20 max-w-6xl mx-auto px-6 text-center py-32">
            <h1 class="text-3xl max-w-3xl mx-auto md:text-5xl font-bold tracking-wide  !leading-[4rem]">
                Be The Reason For <br class="hidden md:block">
                Someone’s Heartbeat. Go Ahead, Donate Blood
                <span class="inline-block">🩸</span>
            </h1>

            <!-- Search Bar -->
            <!-- Search Bar -->
            <div class="mt-8">
                <div class="bg-white shadow-lg rounded-lg py-2 px-4 mx-auto ring-1 ring-white/50">
                    <div class="grid grid-cols-12 gap-3">

                        <!-- Blood Group -->
                        <div class="relative lg:col-span-3 md:col-span-6 col-span-12">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-red-500">
                    <i class="fa fa-droplet"></i>
                </span>
                            <select id="blood_group"
                                    class="w-full pl-10 pr-3 py-2 border rounded-md bg-transparent focus:outline-none mt-1 text-gray-600">
                                <option selected disabled>Select Blood Group</option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>O+</option>
                                <option>O-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                            </select>
                        </div>

                        <div class="relative lg:col-span-3 md:col-span-6 col-span-12">
                             <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-red-500">
                                <i class="fa fa-flag"></i>
                             </span>
                            <select id="country_id"
                                    class="w-full pl-10 pr-3 py-2 border rounded-md bg-transparent focus:outline-none mt-1 text-gray-600">
                                <option selected disabled>Select Country</option>
                            </select>
                        </div>

                        <!-- State -->
                        <div class="relative lg:col-span-3 md:col-span-6 col-span-12">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-red-500">
                    <i class="fa fa-map"></i>
                </span>
                            <select id="state_id"
                                    class="w-full pl-10 pr-3 py-2 border rounded-md bg-transparent focus:outline-none mt-1 text-gray-600">
                                <option selected disabled>Select State</option>
                            </select>
                        </div>

                        <!-- City -->
                        <div class="relative lg:col-span-3 md:col-span-6 col-span-12">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-red-500">
                    <i class="fa fa-building"></i>
                </span>
                            <select id="city_id"
                                    class="w-full pl-10 pr-3 py-2 border rounded-md bg-transparent focus:outline-none mt-1 text-gray-600">
                                <option selected disabled>Select City</option>
                            </select>
                        </div>

                        <!-- Search Button -->
                        <!--                        <div class="lg:col-span-12 md:col-span-12 col-span-12">-->
                        <!--                            <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-2.5 rounded-md w-full">-->
                        <!--                                <i class="fa fa-search"></i> Search-->
                        <!--                            </button>-->
                        <!--                        </div>-->
                        <!-- Search Button -->
                        <!-- Search Button -->
                        <!-- Search Button -->
                        <div class="lg:col-span-12 md:col-span-12 col-span-12">
                            <button type="button" id="homeSearchBtn"
                                    class="bg-red-500 hover:bg-red-600 text-white px-6 py-2.5 rounded-md w-full">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Available Blood Donors-->

    <section class="max-w-6xl mx-auto relative text-center" id="available_donors">
        <div class="absolute z-0 opacity-25">
            <img src="<?= base_url('assets/interfaceimages/img_3.png') ?>" alt="Footer Background"
                 class="w-full h-full object-cover">
        </div>

        <div class="relative z-10 text-center ">
            <h2 class="text-center font-bold text-[2.625rem] text-[#17173A] pt-20 pb-10">Available Blood Donors</h2>

            <div id="blood_group_grid" class="grid grid-cols-12"></div>

            <div class="h-12"></div>
        </div>
    </section>

    <!-- Our Mission -->
    <section class="py-16 md:py-20 relative border-bottom"
             style="background: linear-gradient(to bottom, rgba(251, 54, 64, 0.15), #fff);">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-12 gap-9 items-stretch">

                <!-- Left Side Image -->
                <!-- Left Side Image -->
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12 relative">
                    <div class="h-full relative">
                        <img src="<?= base_url('assets/interfaceimages/img_4.png') ?>"
                             alt="About us"
                             class="w-full h-full object-cover shadow-lg rounded-lg"/>

                        <!-- Play Button (Centered) -->
                        <button onclick="openModal()"
                                class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition">
                                <i class="fas fa-play text-white text-xl ml-1"></i>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12 flex flex-col justify-center">
                    <h2 class="text-3xl font-bold pb-2">Our Mission</h2>
                    <p class="text-gray-600 pb-4 text-[15px]">
                        Our Mission is to Seek Pleasure of Almighty Allah by Saving Human Lives via Facilitating Blood
                        Transfusion.
                    </p>

                    <div class="space-y-5">
                        <!-- Box 1 -->
                        <div class="flex items-start">
                            <div class="bg-[#17173A] rounded-lg w-12 h-12 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fa fa-hands text-red-500 text-[25px]"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold pb-1">Awareness</h4>
                                <p class="text-gray-600 text-[13px]">
                                    We also conduct different seminars and motivational sessions in colleges,
                                    universities
                                    and local communities. We also create awareness among youth of the country.
                                </p>
                            </div>
                        </div>

                        <!-- Box 2 -->
                        <div class="flex items-start">
                            <div class="bg-[#17173A] rounded-lg w-12 h-12 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fab fa-envira text-red-500 text-[25px]"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold pb-1">100% Free</h4>
                                <p class="text-gray-600 text-[13px]">
                                    Blood Bank is Completely Non-Profit Initiative. We try our level best to meet 100%
                                    blood
                                    requirements voluntarily throughout Pakistan.
                                </p>
                            </div>
                        </div>

                        <!-- Box 3 -->
                        <div class="flex items-start">
                            <div class="bg-[#17173A] rounded-lg w-12 h-12 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="far fa-id-card text-red-500 text-[25px]"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold pb-1">Digital Database</h4>
                                <p class="text-gray-600 text-[13px]">
                                    Through our Mobile App and Website, we provide blood donations across Pakistan with
                                    few
                                    taps on finger tips.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Modal -->
    <div id="videoModal"
         class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-50 p-4"
         onclick="closeOnOutsideClick(event)">

        <!-- Video Box -->
        <div id="videoBox"
             class="relative w-full max-w-3xl aspect-video bg-black rounded-lg shadow-2xl transform transition-all duration-300 scale-95 opacity-0"
             onclick="event.stopPropagation()">

            <!-- YouTube Video -->
            <iframe id="videoFrame"
                    class="w-full h-full rounded-lg"
                    src=""
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen>
            </iframe>

            <!-- Close Button -->
            <button onclick="closeModal()"
                    class="absolute -top-10 right-0 border text-white rounded-full p-1 shadow-lg transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>


    <!-- Our Top Donors -->
    <section class="relative">
        <!-- Background Image -->
        <img src="<?= base_url('assets/interfaceimages/img_5.png') ?>"
             class="absolute inset-0 w-full h-full object-cover opacity-5 z-0">

        <!-- Text Content -->
        <div class="max-w-6xl mx-auto relative z-10 py-20 text-center px-4">
            <h1 class="text-4xl font-bold text-black">Our Top Donors</h1>
            <p class="text-md pt-2 text-gray-600 pb-5 font-medium">
                Our Heroes Who Are Dedicated To Serve The Humanity.
            </p>

            <!-- Dynamic Donors Container -->
            <div id="topDonorsContainer" class="grid grid-cols-12 gap-6"></div>
        </div>
    </section>



    <!--Blood Bank is a Social Initiative By Innovate-->
    <section class="relative">
        <!-- Background Image -->
        <img src="<?= base_url('assets/interfaceimages/img_7.png') ?>"
             class="absolute inset-0 w-full h-full object-cover z-0">

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#17173A] to-[#FB3640] opacity-80 z-10 bg-blend-multiply"></div>


        <div class="max-w-6xl mx-auto relative z-20 py-20 px-4 text-white text-center">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-3xl font-semibold leading-relaxed tracking-wide">
                    Blood Bank is a Social Initiative By Innovate Technologies Pakistan 🇵🇰.
                    We provide blood donations across Pakistan with few taps on finger tips.
                </h2>

            </div>

            <div class="h-12"></div>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">

                <!-- Column 1 -->
                <div class="flex flex-col items-center">
                    <i class="fas fa-thin fa-droplet text-red-500 text-[65px] mb-3"></i>
                    <h3 class="text-xl font-bold">8 Blood Groups</h3>

                </div>

                <!-- Column 2 -->
                <div class="flex flex-col items-center">
                    <i class="fas fa-hand-holding-heart text-[65px] text-red-500 text-5xl mb-3"></i>
                    <h3 class="text-xl font-bold">100+ Volunteer</h3>
                </div>

                <!-- Column 3 -->
                <div class="flex flex-col items-center">
                    <i class="fas fa-map text-red-500 text-[65px] mb-3"></i>
                    <h3 class="text-xl font-bold">52 Areas</h3>
                </div>

                <!-- Column 4 -->
                <div class="flex flex-col items-center">
                    <i class="fas fa-heart text-red-500 text-[65px] mb-3"></i>
                    <h3 class="text-xl font-bold">500+ Donors</h3>
                </div>
            </div>
        </div>
    </section>


    <!-- Latest Donors -->
    <section class="relative">
        <!-- Background Image -->
        <img src="<?= base_url('assets/interfaceimages/img_5.png') ?>"
             class="absolute inset-0 w-full h-full object-cover opacity-5 z-0">

        <!-- Text Content -->
        <div class="max-w-6xl mx-auto relative z-10 py-20 text-center px-4">
            <h1 class="text-4xl font-bold text-black">Latest Donors</h1>
            <p class="text-md pt-2 text-gray-600 pb-5 font-medium">Find Out Recently Verified Blood Donors.🩸</p>

            <div id="latestDonors" class="grid grid-cols-12 gap-6"></div>
        </div>
    </section>



    <!--blood donation process-->
    <section class="relative py-32  bg-[url('assets/interfaceimages/img_8.png')] bg-cover bg-center">
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative max-w-6xl mx-auto px-4 z-10">
            <!-- Section Title -->
            <div class="flex justify-center mb-12">
                <div class="w-full lg:w-2/3 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-white">The Blood Donation Process</h2>
                </div>
            </div>

            <!-- Steps -->
            <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

                <!-- Center Connecting Line (only large and above) -->
                <div class="absolute top-16 left-[12.5%] right-[12.5%] h-[2px] bg-red-500 z-0 hidden lg:block"></div>

                <!-- Arrow icons between steps (only large and above) -->
                <i class="absolute top-[50px] left-[25%] text-red-500 text-2xl z-10 hidden lg:block fa fa-angle-right"></i>
                <i class="absolute top-[50px] left-[50%] text-red-500 text-2xl z-10 hidden lg:block fa fa-angle-right"></i>
                <i class="absolute top-[50px] left-[75%] text-red-500 text-2xl z-10 hidden lg:block fa fa-angle-right"></i>

                <!-- Step 1 -->
                <div class="text-center relative z-20">
                    <div class="relative inline-flex items-center justify-center mb-4 bg-[#0d1741] w-24 h-24 rounded-full text-red-500 text-4xl mx-auto">
                        <i class="fa fa-heartbeat"></i>
                        <span class="absolute -top-2 -right-2 w-8 h-8 bg-red-600 text-white text-sm font-bold rounded-full flex items-center justify-center">1</span>
                    </div>
                    <h5 class="text-lg font-semibold text-white">Refreshment and Recovery</h5>
                </div>

                <!-- Step 2 -->
                <div class="text-center relative z-20">
                    <div class="relative inline-flex items-center justify-center mb-4 bg-[#0d1741] w-24 h-24 rounded-full text-red-500 text-4xl mx-auto">
                        <i class="fa fa-tint"></i>
                        <span class="absolute -top-2 -right-2 w-8 h-8 bg-red-600 text-white text-sm font-bold rounded-full flex items-center justify-center">2</span>
                    </div>
                    <h5 class="text-lg font-semibold text-white">Blood Donation</h5>
                </div>

                <!-- Step 3 -->
                <div class="text-center relative z-20">
                    <div class="relative inline-flex items-center justify-center mb-4 bg-[#0d1741] w-24 h-24 rounded-full text-red-500 text-4xl mx-auto">
                        <i class="fa fa-hands"></i>
                        <span class="absolute -top-2 -right-2 w-8 h-8 bg-red-600 text-white text-sm font-bold rounded-full flex items-center justify-center">3</span>
                    </div>
                    <h5 class="text-lg font-semibold text-white">Donation Request</h5>
                </div>

                <!-- Step 4 -->
                <div class="text-center relative z-20">
                    <div class="relative inline-flex items-center justify-center mb-4 bg-[#0d1741] w-24 h-24 rounded-full text-red-500 text-4xl mx-auto">
                        <i class="fa fa-user"></i>
                        <span class="absolute -top-2 -right-2 w-8 h-8 bg-red-600 text-white text-sm font-bold rounded-full flex items-center justify-center">4</span>
                    </div>
                    <h5 class="text-lg font-semibold text-white">Registration</h5>
                </div>

            </div>
        </div>
    </section>


    <!--Our Sponsors-->
    <section style="background: linear-gradient(to top, rgba(251, 54, 64, 0.15), #fff);">
        <div class="max-w-6xl mx-auto relative z-10 py-20 text-center px-4">
            <h1 class="text-4xl font-bold text-black">Our Sponsors</h1>
            <p class="text-md pt-2 text-gray-600 pb-5 font-medium">We Are Proud of Our Partners Who Empower us in This
                Noble Cause of Saving Lives.</p>
            <hr>
            <div class="h-6"></div>
            <!-- Swiper Container -->
            <div class="swiper testimonialSwiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-center pt-4">
                            <img src="<?= base_url('assets/interfaceimages/img_9.png') ?>"
                                 class="w-[6rem] object-contain" alt="Sponsor 1">
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-center pt-4">
                            <img src="<?= base_url('assets/interfaceimages/img_10.png') ?>"
                                 class="w-[6rem]  object-contain" alt="Sponsor 2">
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-center pt-4">
                            <img src="<?= base_url('assets/interfaceimages/img_11.png') ?>"
                                 class="w-[6rem]  object-contain" alt="Sponsor 3">
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-center pt-4">
                            <img src="<?= base_url('assets/interfaceimages/img_12.png') ?>"
                                 class="w-[6rem] object-contain" alt="Sponsor 4">
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-center pt-4">
                            <img src="<?= base_url('assets/interfaceimages/img_13.png') ?>"
                                 class="w-[6rem] object-contain" alt="Sponsor 5">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <!--what blood donors say-->
    <section
            class="py-16 md:py-20 bg-[url('assets/interfaceimages/img_16.png')] bg-cover bg-center bg-no-repeat text-white relative">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[#17173A] bg-opacity-40"></div>

        <div class="max-w-6xl mx-auto px-4 relative z-10">
            <div class="flex justify-center mb-12">
                <div class="w-full lg:w-1/2 text-center">
                    <h2 class="text-3xl font-bold mb-4">What Blood Donors say</h2>
                    <p class="text-lg font-medium">Listen To Their Experience of Blood Donation</p>
                </div>
            </div>


            <div class="swiper testimonial">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-center ">
                            <div class="bg-[#0d1741] rounded-lg p-6">
                                <div class="flex text-yellow-400 mb-4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="mb-6">
                                    I feel comfortable giving a little bit part of me, I welcome the recognition I
                                    receive from those who know that I am a volunteer donor. They see me as a hero for
                                    helping to save other people's lives.
                                </p>
                                <div class="flex items-center">
                                    <h5 class="font-semibold mr-2">Umair</h5>
                                    <span class="text-red-500">(10 times donor)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-center ">
                            <div class="bg-[#0d1741] rounded-lg p-6">
                                <div class="flex text-yellow-400 mb-4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="mb-6">
                                    A life may depend on a gesture from you, a bottle of Blood. “The Blood Donor of
                                    today may be recipient of tomorrow.
                                </p>
                                <div class="flex items-center">
                                    <h5 class="font-semibold mr-2">Salahudin</h5>
                                    <span class="text-red-500">(4 times donor)</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="flex flex-col items-center justify-center ">
                            <div class="bg-[#0d1741] rounded-lg p-6">
                                <div class="flex text-yellow-400 mb-4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="mb-6">
                                    I proudly donate blood on regular basis because it gives other something they
                                    desperately need to survive. Just Knowing that I can make difference in someone's
                                    life , make me feel great.
                                </p>
                                <div class="flex items-center">
                                    <h5 class="font-semibold mr-2">Matieullah</h5>
                                    <span class="text-red-500">(3 times donor)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Latest Blogs -->
    <section class="md:py-20">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-center mb-12">
                <div class="w-full lg:w-2/3 text-center">
                    <h1 class="text-4xl font-bold text-black">Latest Blog</h1>
                    <p class="text-md pt-2 text-gray-600 font-medium">
                        Find Out Latest Health and Blood Donation Related News.
                    </p>
                </div>
            </div>

            <!-- Grid setup -->
            <div id="blogContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Blog cards will be injected here -->
            </div>
        </div>
    </section>


<?= $this->include('interface/scripts/homescripts') ?>


<?= $this->endSection() ?>