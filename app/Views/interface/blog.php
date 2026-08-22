<?= $this->extend('interface/layouts/structure') ?>

<?= $this->section('title') ?>
Blog
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="relative">
    <!-- Background Image -->
    <img src="<?= base_url('assets/interfaceimages/img_8.png') ?>" class="absolute inset-0 w-full h-full object-cover z-0">
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-[#17173A] opacity-[0.4] z-10 "></div>
    <div class="max-w-6xl mx-auto relative z-20 py-20 px-4 text-white text-center">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-center text-white text-4xl font-bold pb-3">Blogs</h1>
            <a href="<?= base_url('/home') ?>" class="hover:text-red-500 font-medium text-md">
                <i class="fa fa-home text-red-500 text-lg"></i> Home
            </a>
            <span class="text-gray-300 text-md">- Blogs</span>
        </div>
    </div>
</section>

<!-- Blog Content Section -->
<section class="md:py-20">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Blog List View -->
        <div id="blogListView">
            <div class="flex justify-center mb-12">
                <div class="w-full lg:w-2/3 text-center">
                    <h1 class="text-4xl font-bold text-black">Latest Blogs</h1>
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

        <!-- Blog Detail View (Initially Hidden) -->
        <div id="blogDetailView" class="hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Blog Detail Content -->
                <div class="lg:col-span-2">
                    <div id="blogDetailContent">
                        <!-- Blog detail will be loaded here -->
                    </div>
                </div>

                <!-- Latest Blogs Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-2xl font-bold text-black mb-6">Recent Posts</h3>
                        <div id="latestBlogsSidebar">
                            <!-- Latest blogs will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (window.location.hash.includes('blog=')) {
            const blogId = window.location.hash.split('=')[1];
            showBlogDetail(blogId);
        } else {
            fetchBlogs();
        }

        window.addEventListener('popstate', function () {
            if (window.location.hash.includes('blog=')) {
                const blogId = window.location.hash.split('=')[1];
                showBlogDetail(blogId);
            } else {
                showBlogList();
            }
        });
    });

    function fetchBlogs() {
        const apiUrl = "<?= site_url('api/blogapi') ?>";

        fetch(apiUrl)
            .then(response => response.json())
            .then(blogs => {
                const container = document.getElementById("blogContainer");
                container.innerHTML = "";

                if (!Array.isArray(blogs) || blogs.length === 0) {
                    container.innerHTML = '<p class="text-center col-span-3 text-gray-500">No blogs found.</p>';
                    return;
                }

                const latestBlogs = blogs.slice(0, 3); // only 3 latest

                latestBlogs.forEach(blog => {
                    const imageUrl = blog.blog_image ?
                        `<?= base_url('uploads/blogs/') ?>${blog.blog_image}` :
                        `<?= base_url('assets/interfaceimages/default-blog.png') ?>`;

                    const formattedDate = formatBlogDate(blog.posted_at);

                    const blogCard = `
    <div class="group bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow cursor-pointer p-3" onclick="showBlogDetail(${blog.id})">
        <div class="h-60 w-full overflow-hidden mb-4 rounded-md">
            <img src="${imageUrl}" alt="${blog.blog_title}" class="w-full h-full object-cover shadow-md transform transition-transform duration-500 group-hover:scale-110">
        </div>
        <div>
            <div class="text-sm text-gray-500 mb-2">${formattedDate}</div>
            <h5 class="text-xl font-bold mb-3 transition-colors hover:text-red-500">
                ${blog.blog_title}
            </h5>
        </div>
    </div>
 `;
                    container.insertAdjacentHTML("beforeend", blogCard);
                });
            })
            .catch(error => {
                console.error("Error fetching blogs:", error);
                document.getElementById("blogContainer").innerHTML = '<p class="text-center col-span-3 text-red-500">Failed to load blogs.</p>';
            });
    }

    function showBlogDetail(blogId) {
        document.getElementById('blogDetailContent').innerHTML = `
        <div class="animate-pulse">
            <div class="h-8 bg-gray-200 rounded w-3/4 mb-4"></div>
            <div class="h-64 bg-gray-200 rounded mb-6"></div>
            <div class="space-y-3">
                <div class="h-4 bg-gray-200 rounded"></div>
                <div class="h-4 bg-gray-200 rounded w-5/6"></div>
            </div>
        </div>
    `;

        fetch(`<?= site_url('api/blogapi/') ?>${blogId}`)
            .then(response => response.json())
            .then(blog => {
                const imageUrl = blog.blog_image ?
                    `<?= base_url('uploads/blogs/') ?>${blog.blog_image}` :
                    `<?= base_url('assets/interfaceimages/default-blog.png') ?>`;

                const formattedDate = formatBlogDate(blog.posted_at);

                // ✅ Styled exactly like your screenshot
                const blogDetailHTML = `
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative h-96 overflow-hidden">
                        <img src="${imageUrl}" alt="${blog.blog_title}" class="w-full h-full object-cover rounded-t-lg">
                        <div class="absolute top-4 right-4 bg-green-600 text-white px-4 py-2 rounded-md font-semibold text-sm shadow-md">
                            ${formattedDate}
                        </div>
                    </div>
                    <div class="p-8">
                        <h1 class="text-3xl font-bold text-black mb-4">${blog.blog_title}</h1>
                        <div class="text-gray-700 leading-relaxed">
                            ${blog.blog_content}
                        </div>
                    </div>
                </article>
            `;

                document.getElementById('blogDetailContent').innerHTML = blogDetailHTML;
                loadLatestBlogs(); // show all 3, no exclusion

                document.getElementById('blogListView').classList.add('hidden');
                document.getElementById('blogDetailView').classList.remove('hidden');

                history.pushState(null, null, `#blog=${blogId}`);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            })
            .catch(error => {
                console.error("Error fetching blog detail:", error);
                document.getElementById('blogDetailContent').innerHTML = '<p class="text-red-500">Failed to load blog details.</p>';
            });
    }

    function loadLatestBlogs() {
        const apiUrl = "<?= site_url('api/blogapi') ?>";

        fetch(apiUrl)
            .then(response => response.json())
            .then(blogs => {
                const sidebar = document.getElementById("latestBlogsSidebar");
                sidebar.innerHTML = "";

                if (!Array.isArray(blogs) || blogs.length === 0) {
                    sidebar.innerHTML = '<p class="text-gray-500">No blogs found.</p>';
                    return;
                }

                const latestBlogs = blogs.slice(0, 3); // ✅ show all 3 always

                latestBlogs.forEach(blog => {
                    const imageUrl = blog.blog_image ?
                        `<?= base_url('uploads/blogs/') ?>${blog.blog_image}` :
                        `<?= base_url('assets/interfaceimages/default-blog.png') ?>`;

                    const formattedDate = formatBlogDate(blog.posted_at);

                    const blogItem = `
    <div class="group cursor-pointer border-b border-gray-200 last:border-b-0 py-3 hover:bg-gray-50 transition">
        <div class="flex items-start space-x-3" onclick="showBlogDetail(${blog.id})">
            <div class="w-16 h-16 flex-shrink-0 overflow-hidden rounded">
                <img src="${imageUrl}"
                     alt="${blog.blog_title}"
                     class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
            </div>
            <div class="flex-1 min-w-0">
                <h6 class="text-sm font-semibold text-gray-900 group-hover:text-red-500 transition-colors line-clamp-2">
                    ${blog.blog_title}
                </h6>
                <div class="text-xs text-gray-500 mt-1">${formattedDate}</div>
            </div>
        </div>
    </div>
`;

                    sidebar.insertAdjacentHTML("beforeend", blogItem);
                });
            })
            .catch(error => {
                console.error("Error fetching latest blogs:", error);
                document.getElementById("latestBlogsSidebar").innerHTML = '<p class="text-red-500">Failed to load latest blogs.</p>';
            });
    }

    function showBlogList() {
        fetchBlogs();
        document.getElementById('blogListView').classList.remove('hidden');
        document.getElementById('blogDetailView').classList.add('hidden');
        history.pushState(null, null, window.location.pathname);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function formatBlogDate(dateString) {
        if (!dateString) return '';
        try {
            const date = new Date(dateString);
            if (isNaN(date.getTime())) return 'Invalid Date';
            const day = date.getDate().toString().padStart(2, '0');
            const month = date.toLocaleString('en-US', { month: 'short' });
            const year = date.getFullYear();
            return `${day} ${month}, ${year}`;
        } catch {
            return dateString;
        }
    }
</script>


<style>

     .line-clamp-2 {
         display: -webkit-box;
         -webkit-line-clamp: 2;
         -webkit-box-orient: vertical;
         overflow: hidden;
     }


</style>



<?= $this->endSection() ?>
