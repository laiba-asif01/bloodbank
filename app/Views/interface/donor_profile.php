<?= $this->extend('interface/layouts/structure') ?>
<?= $this->section('title') ?>
    Donor Profile
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- 🔹 Top Section -->
    <section class="py-16 md:py-20 bg-[url('assets/interfaceimages/img_8.png')] bg-cover bg-center bg-no-repeat text-white relative">
        <div class="absolute inset-0 bg-[#17173A] bg-opacity-65"></div>
        <div class="relative z-10 text-center max-w-5xl mx-auto">
            <img id="donor_image" src="<?= base_url('assets/images/img_6.png') ?>" alt="Donor Image"
                 class="w-40 h-40 rounded-md mx-auto mb-4 border-4 border-white shadow-md object-cover">
            <h2 id="donor_name" class="text-3xl font-bold">Loading...</h2>
            <p id="donor_location" class="text-white text-lg mt-1 mb-4"><i class="fa fa-map-marker text-white"></i> Loading...</p>
            <button><a href="<?=base_url("donor")?>"
                       class="w-full bg-red-600 transition font-semibold py-2 rounded px-4  text-white float-right" >
                    Back to Donors
                </a></button>
        </div>
        <div class="h-12"></div>
    </section>

    <!-- 🔹 Floating Info Bar -->
    <div class="relative z-50 -mt-14">
        <div class="bg-[#0c143d] text-white max-w-5xl mx-auto rounded-md shadow-lg py-4 px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-center">
                <div class="font-semibold text-gray-300 flex flex-col items-center justify-center">
                    <span class="text-md text-white"><i class="fa fa-droplet"></i> Blood Group</span>
                    <span id="blood_group" class="text-red-400 font-bold text-lg sm:text-xl mt-1">--</span>
                </div>
                <div class="font-semibold text-gray-300 flex flex-col items-center justify-center">
                    <span class="text-md text-white"><i class="fa fa-calendar-o"></i> Last Donate</span>
                    <span id="last_donate" class="text-red-400 font-bold text-lg sm:text-xl mt-1">--</span>
                </div>
                <div class="font-semibold text-gray-300 flex flex-col items-center justify-center">
                    <span class="text-md text-white "><i class="fa fa-street-view"></i> Views</span>
                    <span id="view_count" class="text-red-400 font-bold text-lg sm:text-xl mt-1">0</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 🔹 Donor Details Section -->
    <section class="bg-[#fde8e8] py-20 relative z-0 -mt-14">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-8">
            <!-- Donor Details Card -->
            <div class="md:col-span-2 bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 float-left">Donor Details</h3>
                <div id="donor_profile" class="text-gray-800 text-sm"></div>
            </div>

            <!-- Contact Form -->
            <div class="bg-[#0c143d] text-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-4">Contact with Donor</h3>
                <form id="contact_form" class="space-y-4">
                    <input type="hidden" id="donor_id" value="">
                    <input type="hidden" id="donor_phone" value="">
                    <input type="hidden" id="donor_name_hidden" value="">

                    <input type="text" id="contact_name" placeholder="Enter your name" required
                           class="w-full p-3 rounded bg-transparent focus:border-red-500 outline-none text-white placeholder-gray-400"
                           style="border: 1px solid #5e5b5b;">

                    <input type="tel" id="contact_phone" placeholder="Enter your phone number" required
                           class="w-full p-3 rounded bg-transparent focus:border-red-500 outline-none text-white placeholder-gray-400"
                           style="border: 1px solid #5e5b5b;">

                    <textarea id="contact_message" placeholder="Your message to donor" rows="4" required
                              class="w-full p-3 rounded bg-transparent focus:border-red-500 outline-none text-white placeholder-gray-400"
                              style="border: 1px solid #5e5b5b;"></textarea>

                    <button type="submit" id="submit_btn"
                            class="w-full bg-red-600 hover:bg-red-700 transition font-semibold py-2 rounded">
                        <span id="btn_text">Send Message</span>
                        <span id="loading_spinner" class="hidden">
                        <i class="fa fa-spinner fa-spin mr-2"></i>Sending...
                    </span>
                    </button>
                </form>
                <div id="form_message" class="mt-4 text-center hidden p-3 rounded-md"></div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const baseUrl = "<?= base_url() ?>";
            const profileContainer = document.getElementById("donor_profile");

            const urlParams = new URLSearchParams(window.location.search);
            const donorId = urlParams.get("id");

            if (!donorId) {
                profileContainer.innerHTML = `<p class="text-center text-red-500">No donor ID provided.</p>`;
                return;
            }

            // Set donor ID in hidden field
            document.getElementById("donor_id").value = donorId;

            fetch(`${baseUrl}/api/donorapi/${donorId}`)
                .then(res => res.json())
                .then(donor => {
                    if (!donor || donor.status === "error") {
                        profileContainer.innerHTML = `<p class="text-center text-red-500">Donor not found.</p>`;
                        return;
                    }

                    // ✅ Update Header Info
                    document.getElementById("donor_name").textContent = donor.full_name || "N/A";
                    document.getElementById("donor_name_hidden").value = donor.full_name || "";
                    document.getElementById("donor_phone").value = donor.mobile || "";
                    document.getElementById("donor_location").innerHTML = `<i class='fa fa-map-marker text-white'></i> ${donor.city_name || ''}, ${donor.state_name || ''}, ${donor.country_name || ''}`;
                    document.getElementById("blood_group").textContent = donor.blood_group || "N/A";
                    document.getElementById("last_donate").textContent = donor.last_donation_date || "N/A";
                    document.getElementById("view_count").textContent = donor.views || "0";

                    // ✅ Donor Image
                    const donorImage = donor.gender?.toLowerCase() === "female"
                        ? `${baseUrl}/assets/images/img_5.png`
                        : `${baseUrl}/assets/images/img_6.png`;
                    document.getElementById("donor_image").src = donorImage;

                    // ✅ Increment views
                    fetch(`${baseUrl}/api/donorapi/incrementViews/${donorId}`, { method: "POST" })
                        .then(res => res.json())
                        .then(data => {
                            document.getElementById("view_count").textContent = data.views;
                        });

                    // ✅ Details Table
                    const html = `
<table class="w-full border-collapse text-sm">
  <tbody class="divide-y divide-dotted divide-gray-300">
    <tr>
      <td class="py-2 font-semibold">Name</td>
      <td class="py-2">: ${donor.full_name || 'N/A'}</td>
    </tr>
    <tr>
      <td class="py-2 font-semibold">Gender</td>
      <td class="py-2">: ${donor.gender || 'N/A'}</td>
    </tr>
    <tr>
      <td class="py-2 font-semibold">Date of Birth</td>
      <td class="py-2">: ${donor.dob || 'N/A'}</td>
    </tr>
    <tr>
      <td class="py-2 font-semibold">Phone</td>
      <td class="py-2">: ${donor.mobile || 'N/A'}</td>
    </tr>
    <tr>
      <td class="py-2 font-semibold">Address</td>
      <td class="py-2">: ${donor.address || 'N/A'}</td>
    </tr>
    <tr>
      <td class="py-2 font-semibold">Habits</td>
      <td class="py-2">: ${donor.habits || 'N/A'}</td>
    </tr>
    <tr>
      <td class="py-2 font-semibold">Donor Type</td>
      <td class="py-2">: ${donor.donor_type || 'N/A'}</td>
    </tr>
    <tr>
      <td class="py-2 font-semibold">Points</td>
      <td class="py-2">: ${donor.points || '0'}</td>
    </tr>
    <tr>
      <td class="py-2 font-semibold">Status</td>
      <td class="py-2">
        : <span class="px-2 py-1 rounded-md text-white text-xs font-medium
            ${donor.status === 'Active'
                        ? 'bg-green-500'
                        : donor.status === 'Inactive'
                            ? 'bg-red-500'
                            : 'bg-gray-400'}">
            ${donor.status || 'N/A'}
          </span>
      </td>
    </tr>
    <tr>
      <td class="py-2 font-semibold">Joining Date</td>
      <td class="py-2">: ${donor.created_at ? new Date(donor.created_at).toLocaleDateString() : 'N/A'}</td>
    </tr>
  </tbody>
</table>
                `;
                    profileContainer.innerHTML = html;
                })
                .catch(err => {
                    console.error("Error fetching donor:", err);
                    profileContainer.innerHTML = `<p class="text-center text-red-500">Failed to load donor details.</p>`;
                });

            // Contact Form Submission
            document.getElementById("contact_form").addEventListener("submit", function(e) {
                e.preventDefault();

                const donorId = document.getElementById("donor_id").value;
                const donorPhone = document.getElementById("donor_phone").value;
                const donorName = document.getElementById("donor_name_hidden").value;
                const name = document.getElementById("contact_name").value.trim();
                const phone = document.getElementById("contact_phone").value.trim();
                const message = document.getElementById("contact_message").value.trim();

                // Show loading
                document.getElementById("btn_text").classList.add("hidden");
                document.getElementById("loading_spinner").classList.remove("hidden");
                document.getElementById("submit_btn").disabled = true;

                // Basic validation
                if (!name || !phone || !message) {
                    showMessage("Please fill in all fields.", "error");
                    resetButton();
                    return;
                }

                // Phone validation
                const phoneRegex = /^[0-9+\-\s()]{10,15}$/;
                if (!phoneRegex.test(phone)) {
                    showMessage("Please enter a valid phone number (10-15 digits).", "error");
                    resetButton();
                    return;
                }

                // Prepare data
                const formData = {
                    donor_id: donorId,
                    donor_phone: donorPhone,
                    donor_name: donorName,
                    sender_name: name,
                    sender_phone: phone,
                    message: message,
                    timestamp: new Date().toISOString()
                };

                // Send data to API
                fetch(`${baseUrl}/api/donorapi/sendContactMessage`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(formData)
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("API Response:", data);
                        if (data.status === 'success') {
                            showMessage("✓ Message sent successfully! Donor has been notified.", "success");
                            // Clear form
                            document.getElementById("contact_form").reset();
                        } else {
                            showMessage(data.message || "Failed to send message.", "error");
                        }
                        resetButton();
                    })
                    .catch(error => {
                        console.error("Fetch error:", error);
                        showMessage("Network error. Please check your connection.", "error");
                        resetButton();
                    });
            });

            function showMessage(text, type) {
                const messageDiv = document.getElementById("form_message");
                messageDiv.textContent = text;
                messageDiv.className = "mt-4 text-center p-3 rounded-md ";

                if (type === 'success') {
                    messageDiv.classList.add("bg-green-100", "text-green-700", "border", "border-green-300");
                } else {
                    messageDiv.classList.add("bg-red-100", "text-red-700", "border", "border-red-300");
                }

                messageDiv.classList.remove("hidden");

                // Hide message after 5 seconds
                setTimeout(() => {
                    messageDiv.classList.add("hidden");
                }, 5000);
            }

            function resetButton() {
                document.getElementById("btn_text").classList.remove("hidden");
                document.getElementById("loading_spinner").classList.add("hidden");
                document.getElementById("submit_btn").disabled = false;
            }
        });
    </script>
    <script>document.getElementById("contact_form").addEventListener("submit", function(e) {
            e.preventDefault();

            const donorPhone = document.getElementById("donor_phone").value;
            const name = document.getElementById("contact_name").value;
            const phone = document.getElementById("contact_phone").value;
            const message = document.getElementById("contact_message").value;

            if (!name || !phone || !message) {
                alert("Please fill all fields");
                return;
            }

            const text = `
Blood Donation Request
Name: ${name}
Phone: ${phone}
Message: ${message}
    `;

            const url = `https://wa.me/${donorPhone}?text=${encodeURIComponent(text)}`;

            window.open(url, "_blank");
        });
    </script>
<?= $this->endSection() ?>