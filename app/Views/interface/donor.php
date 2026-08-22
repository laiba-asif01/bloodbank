<?= $this->extend('interface/layouts/structure') ?>
<?= $this->section('title') ?>
    Donor
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="py-16 md:py-20 bg-[url('assets/interfaceimages/img_8.png')] bg-cover bg-center bg-no-repeat text-white relative">
        <div class="absolute inset-0 bg-[#17173A] bg-opacity-65"></div>
        <div class="max-w-5xl mx-auto px-4 relative z-10">
            <div class="flex justify-center ">
                <div class="text-center">
                    <h1 class="text-center text-white text-4xl font-bold pb-3">Donor</h1>
                    <a href="<?= base_url('/home') ?>" class="hover:text-red-500 font-medium text-md">
                        <i class="fa fa-home text-red-500 text-lg"></i> Home
                    </a>
                    <span class="text-gray-300 text-md">-Donor</span>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-[#0b0b2a] text-white py-5">
        <div class="max-w-6xl mx-auto px-4">

            <!-- Filters Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-6 mt-2">

                <!-- Blood Group -->
                <div class="flex flex-col">
                    <label class="mb-2 font-medium text-white">Blood Group</label>
                    <select id="blood_group"
                            class="px-4 py-2.5 rounded-md border border-gray-300 w-full text-gray-700 "
                    >
                        <option>Select Group</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                        <option>O+</option>
                        <option>O-</option>
                    </select>
                </div>

                <!-- City -->
                <div class="flex flex-col">
                    <label class="mb-2 font-medium text-white">Country</label>
                    <select id="country_id"
                            class="px-4 py-2.5 rounded-md border border-gray-300 w-full text-gray-700  bg-white"
                    >
                        <option>Select Country</option>
<!--                        <option>Lahore</option>-->
<!--                        <option>Karachi</option>-->
<!--                        <option>Islamabad</option>-->
<!--                        <option>Gujranwala</option>-->
<!--                        <option>Faisalabad</option>-->
                    </select>
                </div>

                <!-- Country -->
                <div class="flex flex-col">
                    <label class="mb-2 font-medium text-white">State</label>
                    <select id="state_id"
                            class="px-4 py-2.5 rounded-md border border-gray-300 w-full text-gray-700 "
                    >
                        <option>Select State</option>
<!--                        <option>Pakistan</option>-->
<!--                        <option>India</option>-->
<!--                        <option>Bangladesh</option>-->
                    </select>
                </div>

                <!-- Donor Type -->
                <div class="flex flex-col">
                    <label class="mb-2 font-medium text-white">City</label>
                    <select id="city_id"
                            class="px-4 py-2.5 rounded-md border border-gray-300 w-full text-gray-700 "
                    >
                        <option>Select City</option>
<!--                        <option>Regular</option>-->
<!--                        <option>Emergency</option>-->
                    </select>
                </div>

                <!-- Search Button -->
                <div class="flex items-end">
                    <button id="search_btn"
                            class="bg-red-600 hover:bg-red-700 text-white px-2 py-3 rounded-md flex items-center justify-center w-40 transition-all"
                    >Search
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Donor Cards -->
    <div class="bg-[linear-gradient(to_bottom,rgba(251,54,64,0.15),#fff)]">
        <div id="donor_cards" class="max-w-6xl mx-auto py-10 px-4 grid sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
    </div>
    <style>
        select option {
            background-color: #0b0b2a;
            color: white;
            padding: 12px;
        }
    </style>


<?= $this->include('interface/scripts/donorscripts') ?>

<?= $this->endSection() ?>