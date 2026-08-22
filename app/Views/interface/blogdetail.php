<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?= $this->extend('interface/layouts/structure') ?>
<?= $this->section('title') ?>
Blog Detail
<?= $this->endSection() ?>
<?= $this->section('content') ?>


    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-10">

            <!-- Main Blog Detail -->
            <div class="lg:col-span-2">
                <div id="blogDetail" class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="h-[400px] w-full overflow-hidden">
                        <img id="blogImage" src="" alt="Blog Image" class="w-full h-full object-cover">
                    </div>
                    <div class="relative -mt-8 ml-6 bg-green-600 text-white px-4 py-2 w-16 text-center rounded-md">
                        <div id="blogDay" class="text-2xl font-bold">--</div>
                        <div id="blogMonth" class="text-sm uppercase">---</div>
                    </div>
                    <div class="p-6">
                        <h1 id="blogTitle" class="text-2xl font-bold mb-4 text-gray-900"></h1>
                        <p id="blogContent" class="text-gray-700 leading-relaxed"></p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <div class="bg-gray-50 shadow-md rounded-lg p-5">
                    <h3 class="text-xl font-semibold mb-5">Recent Post</h3>
                    <div id="recentPosts" class="space-y-4">
                        <!-- Recent posts loaded here -->
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <!-- ✅ Script Section -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const blogId = urlParams.get("id");

            if (blogId) {
                fetchBlogDetail(blogId);
                fetchRecentPosts();
            } else {
                document.getElementById("blogDetail").innerHTML = `<p class='text-center text-red-500 p-6'>Invalid blog ID.</p>`;
            }
        });

        function fetchBlogDetail(id) {
            fetch(`<?= site_url('api/blogapi/show/') ?>${id}`)
                .then(response => response.json())
                .then(blog => {
                    if (!blog || blog.status === 404) {
                        document.getElementById("blogDetail").innerHTML = `<p class='text-center text-gray-500 p-6'>Blog not found.</p>`;
                        return;
                    }

                    const imageUrl = blog.blog_image
                        ? `<?= base_url('uploads/blogs/') ?>${blog.blog_image}`
                        : `<?= base_url('assets/interfaceimages/default-blog.png') ?>`;

                    const dateObj = new Date(blog.posted_at);
                    const day = dateObj.getDate().toString().padStart(2, '0');
                    const month = dateObj.toLocaleString('default', { month: 'short' }).toUpperCase();

                    document.getElementById("blogImage").src = imageUrl;
                    document.getElementById("blogDay").textContent = day;
                    document.getElementById("blogMonth").textContent = month;
                    document.getElementById("blogTitle").textContent = blog.blog_title;
                    document.getElementById("blogContent").innerHTML = blog.blog_content;
                })
                .catch(err => {
                    console.error(err);
                    document.getElementById("blogDetail").innerHTML = `<p class='text-center text-red-500 p-6'>Failed to load blog details.</p>`;
                });
        }

        function fetchRecentPosts() {
            fetch(`<?= site_url('api/blogapi') ?>`)
                .then(response => response.json())
                .then(blogs => {
                    const container = document.getElementById("recentPosts");
                    container.innerHTML = "";

                    blogs.slice(-3).reverse().forEach(blog => {
                        const imageUrl = blog.blog_image
                            ? `<?= base_url('uploads/blogs/') ?>${blog.blog_image}`
                            : `<?= base_url('assets/interfaceimages/default-blog.png') ?>`;

                        const post = `
                    <a href="blogdetail?id=${blog.id}" class="flex items-center space-x-3 group">
                        <img src="${imageUrl}" class="w-16 h-16 rounded object-cover shadow-sm" alt="">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-800 group-hover:text-red-500 transition-colors">
                                ${blog.blog_title}
                            </h4>
                        </div>
                    </a>`;
                        container.insertAdjacentHTML("beforeend", post);
                    });
                })
                .catch(err => {
                    console.error(err);
                    document.getElementById("recentPosts").innerHTML = `<p class='text-gray-500'>Failed to load recent posts.</p>`;
                });
        }
    </script>




<?= $this->endSection() ?>