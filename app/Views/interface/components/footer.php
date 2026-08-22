<footer class="relative text-white">
    <!-- Background Image (z-0) -->
    <div class="absolute inset-0 z-0">
        <img src="<?=base_url('assets/interfaceimages/img_1.png')?>" alt="Footer Background" class="w-full h-full object-cover">
    </div>

    <!-- Gradient Overlay (z-10) -->
    <div class="absolute inset-0 z-10 opacity-80
              bg-gradient-to-r from-[#17173A] to-[#FB3640]
              mix-blend-multiply">
    </div>

    <!-- Dark Overlay (z-10 too, ya alag after:) -->
    <div class="absolute inset-0 z-10 after:content-[''] after:absolute after:inset-0
              after:bg-[#17173A] after:opacity-45">
    </div>
    <!-- Content Wrapper -->
    <div class="relative z-10 max-w-6xl mx-auto px-6 py-3">
        <div class="h-[2rem]"></div>
        <!-- Top Section -->
        <div class="flex flex-col md:flex-row items-center justify-between border-b border-white/20 pb-6 gap-4">
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-phone text-red-500"></i>
                    <span>+92-312-2879500</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-red-500"></i>
                    <span>bloodbank@innovate.com.pk</span>
                </div>
            </div>
            <a href="<?=base_url('applyasdonor')?>">
            <button class="bg-red-500 hover:bg-red-600 px-6 py-2 rounded-md font-semibold">
                Become A Donor
            </button>
            </a>
        </div>


        <div class="grid grid-cols-12 py-16">
            <!-- Logo + Description (2 columns ka space lega) -->
            <div class="lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                <h2 class="text-2xl font-bold items-center gap-2 inline-block pb-1">
                    <img src="<?= base_url('assets/interfaceimages/img.png') ?>" alt="BloodBank Logo" class="h-10 w-auto">
                </h2>
                <p class="mt-4 text-md tracking-wide">
                    Blood Bank is a Social Welfare Initiative By Innovate Technologies Pakistan To Maximize The Blood Donations and Minimize The Human Loss.
                </p>

                <!-- Newsletter -->
                <div class="mt-4 flex">
                    <input type="email" placeholder="Enter email address"
                           class="px-4 py-2 w-full border-1 border-gray-600 bg-transparent text-white placeholder-white/70 rounded-l-md focus:outline-none focus:border-red-500">
                    <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-r-md">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>
            <div class="lg:col-span-2 md:col-span-2 sm:col-span-2 col-span-2"></div>

            <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12 lg:pt-0 md:pt-16 sm:pt-16 pt-16">
                <div class="grid grid-cols-3">
                    <!-- Short Links -->
                    <div class="col-span-1">
                        <h3 class="text-lg font-semibold border-b-2 border-red-500 inline-block pb-1">Short Links</h3>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li><a href="<?=base_url('aboutus')?>" class="hover:text-red-400"><i class="fa fa-arrow-circle-right"></i> About Us</a></li>
                            <li><a href="<?=base_url('donor')?>" class="hover:text-red-400"><i class="fa fa-arrow-circle-right"></i> Donor</a></li>
                            <li><a href="<?=base_url('blog')?>" class="hover:text-red-400"><i class="fa fa-arrow-circle-right"></i> Blog</a></li>
                            <li><a href="<?=base_url('contact')?>" class="hover:text-red-400"><i class="fa fa-arrow-circle-right"></i> Contact</a></li>
                        </ul>
                    </div>

                    <!-- Support -->
                    <div class="col-span-1">
                        <h3 class="text-lg font-semibold border-b-2 border-red-500 inline-block pb-1">Support</h3>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li><a href="#" class="hover:text-red-400"><i class="fa fa-arrow-circle-right"></i> Support Center</a></li>
                            <li><a href="#" class="hover:text-red-400"><i class="fa fa-arrow-circle-right"></i> Apply as a Donor</a></li>
                            <li><a href="#" class="hover:text-red-400"><i class="fa fa-arrow-circle-right"></i> Terms of Service</a></li>
                            <li><a href="#" class="hover:text-red-400"><i class="fa fa-arrow-circle-right"></i> Privacy Policy</a></li>
                        </ul>
                    </div>

                    <!-- Stats -->
                    <div class="col-span-1">
                    <div class="flex flex-col text-end space-y-6">
                        <div class="border-b border-white/20 ">
                            <h4 class="text-2xl font-bold">100+</h4>
                            <p class="pb-4">Donors</p>
                        </div>
                        <div>
                            <h4 class="text-2xl font-bold">50+</h4>
                            <p>Volunteers</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Bottom Section -->
        <div class="flex items-center justify-between border-t border-white/20 pt-6 text-sm">
            <p>
                Copyright © 2025
                <span class="text-red-400">Innovate Technologies</span> All Rights Reserved
            </p>
            <a href="#" class="bg-red-500 hover:bg-red-600 w-10 h-10 flex items-center justify-center rounded-full">
                <i class="fa-solid fa-arrow-up"></i>
            </a>

        </div>
        <div class="h-[0.5rem]"></div>

    </div>
</footer>


<script>
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar");
    const closeSidebar = document.getElementById("close-sidebar");
    const overlay = document.getElementById("overlay");

    function closeMenu() {
        sidebar.classList.add("translate-x-full");
        overlay.classList.add("hidden");
    }

    menuToggle.addEventListener("click", () => {
        sidebar.classList.remove("translate-x-full");
        overlay.classList.remove("hidden");
    });

    closeSidebar.addEventListener("click", closeMenu);
    overlay.addEventListener("click", closeMenu);

    window.addEventListener("resize", () => {
        if (window.innerWidth >= 768) {
            closeMenu();
        }
    });
</script>
<script>
    function openModal() {
        const modal = document.getElementById('videoModal');
        const box = document.getElementById('videoBox');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Animate video box
        setTimeout(() => {
            box.classList.remove('scale-95', 'opacity-0');
            box.classList.add('scale-100', 'opacity-100');
        }, 10);

        document.getElementById('videoFrame').src = "https://www.youtube.com/embed/MU8CrgctkWM?autoplay=1";
    }

    function closeModal() {
        const modal = document.getElementById('videoModal');
        const box = document.getElementById('videoBox');

        // Animate OUT
        box.classList.remove('scale-100', 'opacity-100');
        box.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            document.getElementById('videoFrame').src = ""; // stop video
        }, 300);
    }

    function closeOnOutsideClick(e) {
        if (e.target.id === "videoModal") {
            closeModal();
        }
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.testimonialSwiper', {
            slidesPerView: 2, // 👈 default ko 2 kar do
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 40,
                },
            },
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".testimonial", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
            },
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const faqItems = document.querySelectorAll(".faq-item");

        faqItems.forEach((item) => {
            const header = item.querySelector(".faq-header");
            const answer = item.querySelector(".faq-answer");
            const arrow = item.querySelector(".arrow-icon");
            const question = item.querySelector(".faq-question");

            header.addEventListener("click", () => {
                // Close all other FAQ items
                faqItems.forEach((otherItem) => {
                    if (otherItem !== item) {
                        otherItem.classList.remove("active");
                        otherItem.querySelector(".faq-answer").style.maxHeight = null;
                        otherItem.querySelector(".faq-header").classList.remove("bg-bloodRed");
                        otherItem.querySelector(".faq-header").classList.add("bg-lightRed");
                        otherItem.querySelector(".faq-question").classList.remove("text-white");
                        otherItem.querySelector(".arrow-icon").style.transform = "rotate(0deg)";
                        otherItem.querySelector(".arrow-icon").classList.remove("text-white");
                        otherItem.style.borderRadius = "0.5rem";
                    }
                });

                // Toggle current item
                item.classList.toggle("active");

                if (item.classList.contains("active")) {
                    answer.style.maxHeight = answer.scrollHeight + "px";
                    header.classList.remove("bg-lightRed");
                    header.classList.add("bg-bloodRed");
                    question.classList.add("text-white");
                    arrow.style.transform = "rotate(180deg)";
                    arrow.classList.add("text-white");
                    // Keep all edges rounded when active
                    item.style.borderRadius = "0.5rem";
                } else {
                    answer.style.maxHeight = null;
                    header.classList.remove("bg-bloodRed");
                    header.classList.add("bg-lightRed");
                    question.classList.remove("text-white");
                    arrow.style.transform = "rotate(0deg)";
                    arrow.classList.remove("text-white");
                    item.style.borderRadius = "0.5rem";
                }
            });
        });
    });
</script>



