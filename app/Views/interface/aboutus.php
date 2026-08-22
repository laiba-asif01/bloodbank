<?= $this->extend('interface/layouts/structure') ?>
<?= $this->section('title') ?>
About Us
<?= $this->endSection() ?>
<?= $this->section('content') ?>


<section class="relative">
    <!-- Background Image -->
    <img src="<?= base_url('assets/interfaceimages/img_8.png') ?>"
         class="absolute inset-0 w-full h-full object-cover z-0">

    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-[#17173A] opacity-[0.4] z-10 "></div>


    <div class="max-w-6xl mx-auto relative z-20 py-20 px-4 text-white text-center">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-center text-white text-4xl font-bold pb-3">About Us</h1>
            <!--        <span><i class="fa fa-home text-red-500 text-lg"></i></span>-->
            <!--            <span class="text-white hover:text-red-500 font-medium text-md">Home</span>-->
            <!--            <span class="text-gray-300 text-md">-About Us</span>-->

            <a href="<?= base_url('/home') ?>" class="hover:text-red-500 font-medium text-md">
                <i class="fa fa-home text-red-500  text-lg"></i> Home
            </a>
            <span class="text-gray-300 text-md">-About Us</span>

        </div>
    </div>
</section>


<!-- Our Mission -->

<section class="py-12 md:py-20 relative"
         style="background: linear-gradient(to bottom, rgba(251, 54, 64, 0.15), #fff);">
    <div class="h-[40px]"></div>
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
                                We also conduct different seminars and motivational sessions in colleges, universities
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
                                Blood Bank is Completely Non-Profit Initiative. We try our level best to meet 100% blood
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
                                Through our Mobile App and Website, we provide blood donations across Pakistan with few
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



<!--latest blogs-->

<section class=" md:py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-center mb-12">
            <div class="w-full lg:w-2/3 text-center">
                <h2 class="text-3xl font-bold mb-4">Latest Blog</h2>
                <p class="text-gray-600">Find Out Latest Health and Blood Donation Related News.</p>
            </div>
        </div>

        <!-- Grid setup -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Card 1 -->
            <a href="#" class="group bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow block p-3">
                <!-- Image wrapper with fixed height -->
                <div class="h-60 w-full overflow-hidden mb-4 rounded-md">
                    <img src="<?=base_url('assets/interfaceimages/img_2.png')?>"
                         alt="Blog post"
                         class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                </div>

                <!-- Text content -->
                <div>
                    <div class="text-sm text-gray-500 mb-2">28 Oct 2022</div>
                    <h5 class="text-xl font-bold mb-3 transition-colors hover:text-red-500">
                        Benefits Of Blood Donation
                    </h5>
                </div>
            </a>


            <!-- Card 2 -->
            <a href="#" class="group bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow block p-3">
                <!-- Image wrapper with fixed height -->
                <div class="h-60 w-full overflow-hidden mb-4 rounded-md">
                    <img src="<?=base_url('assets/interfaceimages/img_14.png')?>"
                         alt="Blog post"
                         class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                </div>

                <!-- Text content -->
                <div>
                    <div class="text-sm text-gray-500 mb-2">28 Oct 2022</div>
                    <h5 class="text-xl font-bold mb-3 transition-colors hover:text-red-500">
                        Benefits Of Blood Donation
                    </h5>
                </div>
            </a>




            <!-- Card 3 -->
            <a href="#" class="group bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow block p-3">
                <!-- Image wrapper with fixed height -->
                <div class="h-60 w-full overflow-hidden mb-4 rounded-md">
                    <img src="<?=base_url('assets/interfaceimages/img_2.png')?>"
                         alt="Blog post"
                         class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                </div>

                <!-- Text content -->
                <div>
                    <div class="text-sm text-gray-500 mb-2">28 Oct 2022</div>
                    <h5 class="text-xl font-bold mb-3 transition-colors hover:text-red-500">
                        Benefits Of Blood Donation
                    </h5>
                </div>
            </a>




        </div>
    </div>
</section>





<!--Our Sponsors-->
<section style="background: linear-gradient(to top, rgba(251, 54, 64, 0.15), #fff);">
    <div class="max-w-6xl mx-auto relative z-10 py-16 text-center px-4">
        <h1 class="text-4xl font-bold text-black">Our Sponsors</h1>
        <p class="text-md pt-2 text-gray-600 pb-5">We Are Proud of Our Partners Who Empower us in This Noble Cause of
            Saving Lives.</p>
        <hr>
        <div class="h-[3rem]"></div>
        <!-- Swiper Container -->
        <div class="swiper testimonialSwiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="flex flex-col items-center justify-center pt-4">
                        <img src="<?= base_url('assets/interfaceimages/img_9.png') ?>" class="w-[6rem] object-contain"
                             alt="Sponsor 1">
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="flex flex-col items-center justify-center pt-4">
                        <img src="<?= base_url('assets/interfaceimages/img_10.png') ?>" class="w-[6rem]  object-contain"
                             alt="Sponsor 2">
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="flex flex-col items-center justify-center pt-4">
                        <img src="<?= base_url('assets/interfaceimages/img_11.png') ?>" class="w-[6rem]  object-contain"
                             alt="Sponsor 3">
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="flex flex-col items-center justify-center pt-4">
                        <img src="<?= base_url('assets/interfaceimages/img_12.png') ?>" class="w-[6rem] object-contain"
                             alt="Sponsor 4">
                    </div>
                </div>

                <!-- Slide 5 -->
                <div class="swiper-slide">
                    <div class="flex flex-col items-center justify-center pt-4">
                        <img src="<?= base_url('assets/interfaceimages/img_13.png') ?>" class="w-[6rem] object-contain"
                             alt="Sponsor 5">
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="h-[2rem]"></div>

</section>



<!--faqs-->
<div class="h-[6rem]"></div>
<section class="max-w-6xl mx-auto px-4">
    <div class="text-center pb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Have questions about blood donation? Find answers to common queries below. Your generosity can save lives! ❤️
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Column 1 -->
        <div class="space-y-6">
            <!-- FAQ Item 1 -->
            <div class="faq-item rounded-lg bg-white shadow-sm">
                <div class="faq-header cursor-pointer px-4 py-4 flex justify-between items-center rounded-lg bg-lightRed transition-colors duration-300">
                    <h3 class="faq-question text-lg font-semibold text-gray-800">
                        What should I do after donating blood?
                    </h3>
                    <span class="arrow-icon text-red-500 transform transition-transform duration-300">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                </div>
                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                    <div class="px-4 pb-4 text-gray-600 pt-3">
                        <p class="leading-relaxed">
                            After donating blood, you should rest for a short period, drink plenty of fluids,
                            avoid strenuous physical activity for the rest of the day, and keep the bandage on
                            for a few hours. If you feel lightheaded, lie down until the feeling passes.
                            It's also recommended to avoid alcohol for 24 hours and not to smoke for a few hours.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item rounded-lg bg-white shadow-sm">
                <div class="faq-header cursor-pointer px-4 py-4 flex justify-between items-center rounded-lg bg-lightRed transition-colors duration-300">
                    <h3 class="faq-question text-lg font-semibold text-gray-800">
                        Can I donate blood if I have a tattoo?
                    </h3>
                    <span class="arrow-icon text-red-500 transform transition-transform duration-300">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                </div>
                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                    <div class="px-4 pb-4 text-gray-600 pt-3">
                        <p class="leading-relaxed">
                            Yes, but you may need to wait a few months depending on your country's blood donation guidelines.
                            In most cases, you'll need to wait 3-6 months after getting a tattoo to ensure there's no risk of infection.
                            Always inform the blood donation center about recent tattoos so they can provide accurate guidance.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item rounded-lg bg-white shadow-sm">
                <div class="faq-header cursor-pointer px-4 py-4 flex justify-between items-center rounded-lg bg-lightRed transition-colors duration-300">
                    <h3 class="faq-question text-lg font-semibold text-gray-800">
                        How often can I donate blood?
                    </h3>
                    <span class="arrow-icon text-red-500 transform transition-transform duration-300">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                </div>
                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                    <div class="px-4 pb-4 text-gray-600 pt-3">
                        <p class="leading-relaxed">
                            The frequency of blood donation depends on the type of donation and your location:
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Whole blood: Every 56 days (up to 6 times a year)</li>
                            <li>Platelets: Every 7 days (up to 24 times a year)</li>
                            <li>Plasma: Every 28 days (up to 13 times a year)</li>
                        </ul>
                        Always check with your local blood donation center for specific guidelines.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 2 -->
        <div class="space-y-6">
            <!-- FAQ Item 4 -->
            <div class="faq-item rounded-lg bg-white shadow-sm">
                <div class="faq-header cursor-pointer px-4 py-4 flex justify-between items-center rounded-lg bg-lightRed transition-colors duration-300">
                    <h3 class="faq-question text-lg font-semibold text-gray-800">
                        Who is eligible to donate blood?
                    </h3>
                    <span class="arrow-icon text-red-500 transform transition-transform duration-300">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                </div>
                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                    <div class="px-4 pb-4 text-gray-600 pt-3">
                        <p class="leading-relaxed">
                            Generally, to donate blood you must:
                        <ul class="list-disc pl-5 mt-2 space-y-1">
                            <li>Be at least 17 years old (16 in some places with parental consent)</li>
                            <li>Weigh at least 110 pounds (50 kg)</li>
                            <li>Be in good general health</li>
                            <li>Not have donated blood in the past 56 days (for whole blood)</li>
                            <li>Pass a hemoglobin test and health screening</li>
                        </ul>
                        Specific eligibility criteria may vary by country and donation center.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item rounded-lg bg-white shadow-sm">
                <div class="faq-header cursor-pointer px-4 py-4 flex justify-between items-center rounded-lg bg-lightRed transition-colors duration-300">
                    <h3 class="faq-question text-lg font-semibold text-gray-800">
                        Does blood donation hurt?
                    </h3>
                    <span class="arrow-icon text-red-500 transform transition-transform duration-300">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                </div>
                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                    <div class="px-4 pb-4 text-gray-600 pt-3">
                        <p class="leading-relaxed">
                            Most people report feeling only a slight pinch when the needle is inserted.
                            During the donation process, you shouldn't feel pain, though some people
                            experience mild discomfort. The entire process typically takes about 10-15 minutes
                            for a whole blood donation. The staff is trained to make your experience as
                            comfortable as possible.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 6 -->
            <div class="faq-item rounded-lg bg-white shadow-sm">
                <div class="faq-header cursor-pointer px-4 py-4 flex justify-between items-center rounded-lg bg-lightRed transition-colors duration-300">
                    <h3 class="faq-question text-lg font-semibold text-gray-800">
                        How long does it take to donate blood?
                    </h3>
                    <span class="arrow-icon text-red-500 transform transition-transform duration-300">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                </div>
                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500">
                    <div class="px-4 pb-4 text-gray-600 pt-3">
                        <p class="leading-relaxed">
                            The actual blood donation typically takes about 8-10 minutes for a whole blood donation.
                            However, you should plan to spend about an hour at the donation center for registration,
                            a health screening, the donation itself, and refreshments afterward.
                            Platelet donations can take between 1.5 to 2.5 hours.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="h-[6rem]"></div>


<?= $this->endSection() ?>
