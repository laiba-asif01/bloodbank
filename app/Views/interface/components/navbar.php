<!-- Top Contact Bar -->
<div class="bg-[#12123a] border-b border-gray-700">
    <div class="text-white text-sm flex justify-start md:justify-start gap-6 py-2 px-4 max-w-6xl mx-auto">
        <div class="flex items-center gap-2">
            <span><i class="fa fa-phone"></i></span>
            <span>+92-312-2879500</span>
        </div>
        <div class="flex items-center gap-2">
            <span><i class="fa fa-envelope"></i></span>
            <span>bloodbank@innovate.com.pk</span>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="bg-[#12123a] text-white relative border-b border-gray-700">
    <div class="max-w-6xl mx-auto px-4 flex justify-between items-center py-4">

        <!-- Logo -->
        <div class="flex items-center gap-2">
            <img src="<?= base_url('assets/interfaceimages/img.png') ?>" alt="BloodBank Logo" class="h-10 w-auto">
            <!-- h-10 rakha hai, normal logo size -->
        </div>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center gap-6">
            <a href="<?=base_url('home')?>" class="nav-link hover:text-red-500 font-medium">Home</a>
            <a href="<?=base_url('aboutus')?>" class="nav-link hover:text-red-500 font-medium">About Us</a>
            <a href="<?=base_url('donor')?>" class="nav-link hover:text-red-500 font-medium">Donor</a>
            <a href="<?=base_url('blog')?>" class="nav-link hover:text-red-500 font-medium">Blog</a>
            <a href="<?=base_url('contact')?>" class="nav-link hover:text-red-500 font-medium">Contact</a>
<!--            <a href="--><?php //=base_url('applyasdonor')?><!--" class="bg-red-500 px-4 py-2 rounded text-white">Apply as a Donor</a>-->
            <a href="<?=base_url('registerasuser')?>" class="bg-red-500 px-4 py-2 rounded text-white">Register as User</a>
            <a href="<?=base_url('login')?>" class="bg-red-500 px-4 py-2 rounded text-white">Admin Pannel</a>

        </div>

        <!-- Mobile Toggle -->
        <button id="menu-toggle" class="lg:hidden text-2xl">
            ☰
        </button>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 right-0 h-full w-50 max-w-xs bg-[#12123a] text-white transform translate-x-full transition-transform duration-300 ease-in-out z-50">        <div class="flex justify-between items-center px-4 py-4 border-b border-gray-700">
            <span class="text-xl font-bold"><span class="text-red-600 ">Blood</span>Bank</span>
            <button id="close-sidebar" class="text-2xl"><i class="fa fa-solid fa-circle-xmark"></i></button>
        </div>
        <div class="flex flex-col">
            <a href="<?=base_url('home')?>" class="nav-link hover:text-red-500 px-6 py-3 border-b border-[rgba(255,255,255,0.15)]">Home</a>
            <a href="<?=base_url('aboutus')?>" class="nav-link hover:text-red-500 px-6 py-3 border-b border-[rgba(255,255,255,0.15)]">About Us</a>
            <a href="<?=base_url('donor')?>" class="nav-link hover:text-red-500 px-6 py-3 border-b border-[rgba(255,255,255,0.15)]">Donor</a>
            <a href="<?=base_url('blog')?>" class="nav-link hover:text-red-500 px-6 py-3 border-b border-[rgba(255,255,255,0.15)]">Blog</a>
            <a href="<?=base_url('contact')?>" class="nav-link hover:text-red-500 px-6 py-3 border-b border-[rgba(255,255,255,0.15)]">Contact</a>
<!--            <a href="--><?php //=base_url('applyasdonor')?><!--" class="bg-red-500 px-4 py-3 rounded text-white">Apply as a Donor</a>-->
            <a href="<?=base_url('registerasuser')?>" class="bg-red-500 px-4 py-3 rounded text-white">Register as User</a>
        </div>
    </div>


    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30"></div>
</nav>

<script>
    const currentPath = window.location.pathname.replace(/\/$/, '');

    document.querySelectorAll('.nav-link').forEach(link => {
        const linkPath = new URL(link.href).pathname.replace(/\/$/, '');

        if (currentPath === linkPath || (currentPath === '' && linkPath.includes('home'))) {
            link.classList.add('text-red-500', 'font-semibold');
        }
    });
</script>
