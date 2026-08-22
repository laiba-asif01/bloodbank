<?= $this->extend('interface/layouts/structure') ?>
<?= $this->section('title') ?>
Register As User
<?= $this->endSection() ?>

<?= $this->section('content') ?>


    <!-- Success Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered w-[40%]" role="document">
            <div class="modal-content rounded-lg overflow-hidden border-0 shadow-xl">
                <div class="modal-header bg-red-500 text-white flex justify-between items-center py-4 px-6">
                    <h5 class="modal-title text-xl font-bold" id="successModalLabel">Registration Successful!</h5>
                    <button type="button" class="close text-white focus:outline-none" data-dismiss="modal" aria-label="Close">
                        <span class="text-2xl" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body border text-center py-6 px-6">
                    <div class="mb-4">
                        <i class="fa fa-check-circle text-red-500 fa-4x mb-3"></i>
                        <h4 class="text-red-600 font-bold text-xl">Welcome to Our Platform!</h4>
                        <h3 class="text-gray-700 text-center pt-3 font-medium">Please save these credentials!</h3>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-6 mb-4">

                        <!-- Centered Grid Wrapper -->
                        <div class="mx-auto w-fit pl-16">

                            <!-- Table-like Grid -->
                            <div class="grid grid-cols-2 gap-x-16 gap-y-4 text-left">

                                <!-- Row 1 -->
                                <div class="text-gray-700 font-semibold">
                                    Registration Number:
                                </div>
                                <div class="font-mono text-gray-700 font-bold">
                                    <span id="registrationNumber"></span>
                                </div>

                                <!-- Row 2 -->
                                <div class="text-gray-700 font-semibold">
                                    Password:
                                </div>
                                <div class="font-mono text-gray-700 font-bold">
                                    <span id="userPassword"></span>
                                </div>

                            </div>

                        </div>

                    </div>


                    <p class="text-gray-600">You can now login to your personal portal.</p>
                </div>
                <div class="modal-footer justify-content-center bg-gray-50 py-4 px-6">
                    <button type="button" class="btn bg-gray-500 hover:bg-gray-600 text-white font-medium px-5 py-2 rounded-md transition duration-200 mr-2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-red-500 hover:bg-red-600 text-white font-medium px-5 py-2 rounded-md transition duration-200" id="goToLoginBtn">
                        Login to Portal
                    </button>
                </div>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>