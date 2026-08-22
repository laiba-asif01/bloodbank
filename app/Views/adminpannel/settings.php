<?= $this->extend('adminpannel/layouts/structure') ?>
<?= $this->section('title') ?>
    settings
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="content-wrapper" style="min-height: 127.698px;">

        <!-- Toast Notification Container -->
        <div id="toast-container" class="toast-container"></div>

        <!-- Main content -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard <small>Settings</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#app_settings" data-toggle="tab">App Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="#admob_settings" data-toggle="tab">Admob Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="#notification_settings" data-toggle="tab">Notification Settings</a></li>
                            <li class="nav-item"><a class="nav-link" href="#api_keys" data-toggle="tab">API Keys</a></li>
                            <li class="nav-item"><a class="nav-link" href="/privacypolicy">App Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <!-- App Settings -->
                            <div class="tab-pane active" id="app_settings">
                                <form id="app_settings_form" action="<?= site_url('settings/saveAppSettings') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">App Name :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="app_name" id="app_name"
                                                   value="<?= esc($settings['app_name'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">App Logo :-</label>
                                        <div class="col-md-10">
                                            <input type="file" name="app_logo" id="fileupload" accept="image/*">
                                            <div class="fileupload_img mt-2">
                                                <img id="logo_preview" style="width: 30%; height: auto;" class="img-thumbnail"
                                                     src="<?= base_url($settings['app_logo'] ?? 'images/icon.png') ?>"
                                                     alt="App Logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">App Description :-</label>
                                        <div class="col-md-10">
                                            <textarea name="app_description" id="app_description" class="form-control"><?= esc($settings['app_description'] ?? '') ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">App Version :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="app_version" id="app_version"
                                                   value="<?= esc($settings['app_version'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Author :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="app_author" id="app_author"
                                                   value="<?= esc($settings['app_author'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Contact :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="app_contact" id="app_contact"
                                                   value="<?= esc($settings['app_contact'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Email :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="app_email" id="app_email"
                                                   value="<?= esc($settings['app_email'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Website :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="app_website" id="app_website"
                                                   value="<?= esc($settings['app_website'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Developed By :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="app_developed_by" id="app_developed_by"
                                                   value="<?= esc($settings['app_developed_by'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10 offset-2">
                                            <button type="submit" name="submit" class="btn btn-block btn-flat btn-info">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Admob Settings -->
                            <div class="tab-pane" id="admob_settings">
                                <form id="admob_settings_form" action="<?= site_url('settings/saveAdmobSettings') ?>" method="post">
                                    <div class="setting-title">Android Admob Settings</div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Publisher ID :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="publisher_id" id="publisher_id"
                                                   value="<?= esc($settings['publisher_id'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Admob App ID :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="app_id_android" id="app_id_android"
                                                   value="<?= esc($settings['app_id_android'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="setting-title">Banner Ads :-</div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Banner Ad:-</label>
                                        <div class="col-md-10">
                                            <select name="banner_ad" id="banner_ad" class="form-control">
                                                <option value="true" <?= ($settings['banner_ad'] ?? '') === 'true' ? 'selected' : '' ?>>True</option>
                                                <option value="false" <?= ($settings['banner_ad'] ?? '') === 'false' ? 'selected' : '' ?>>False</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Banner ID :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="banner_ad_id" id="banner_ad_id"
                                                   value="<?= esc($settings['banner_ad_id'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="setting-title">Interstitial Ads :-</div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Interstitial :-</label>
                                        <div class="col-md-10">
                                            <select name="interstital_ad" id="interstital_ad" class="form-control">
                                                <option value="true" <?= ($settings['interstital_ad'] ?? '') === 'true' ? 'selected' : '' ?>>True</option>
                                                <option value="false" <?= ($settings['interstital_ad'] ?? '') === 'false' ? 'selected' : '' ?>>False</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Interstitial ID :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="interstital_ad_id" id="interstital_ad_id"
                                                   value="<?= esc($settings['interstital_ad_id'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Interstitial Clicks :-</label>
                                        <div class="col-md-10">
                                            <input type="number" name="interstital_ad_click" id="interstital_ad_click"
                                                   value="<?= esc($settings['interstital_ad_click'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10 offset-2">
                                            <button type="submit" class="btn btn-block btn-info">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Notification Settings -->
                            <div class="tab-pane" id="notification_settings">
                                <form id="notification_settings_form" action="<?= site_url('settings/saveNotificationSettings') ?>" method="post">
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">OneSignal App ID :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="onesignal_app_id" id="onesignal_app_id"
                                                   value="<?= esc($settings['onesignal_app_id'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">OneSignal Rest Key :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="onesignal_rest_key" id="onesignal_rest_key"
                                                   value="<?= esc($settings['onesignal_rest_key'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10 offset-2">
                                            <button type="submit" class="btn btn-block btn-info">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- API Keys -->
                            <div class="tab-pane" id="api_keys">
                                <form id="api_keys_form" action="<?= site_url('settings/saveApiKeys') ?>" method="post">
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Google Maps API Key :-</label>
                                        <div class="col-md-10">
                                            <input type="text" name="google_maps_api_key" id="google_maps_api_key"
                                                   value="<?= esc($settings['google_maps_api_key'] ?? '') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10 offset-2">
                                            <button type="submit" class="btn btn-block btn-info">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .setting-title { font-size:18px;font-weight:bold;margin:20px 0 15px;padding-bottom:5px;border-bottom:1px solid #ddd; }
        .toast-container { position:fixed;top:20px;right:20px;z-index:9999;display:flex;flex-direction:column;gap:10px; }
        .toast { background:black;color:white;padding:15px 20px;border-radius:4px;box-shadow:0 4px 12px rgba(0,0,0,0.15);min-width:300px;display:flex;justify-content:space-between;align-items:center;transform:translateX(400px);opacity:0;transition:transform .5s ease,opacity .5s ease; }
        .toast.show { transform:translateX(0);opacity:1; }
        .toast.hide { transform:translateX(-400px);opacity:0; }
        .toast-close { background:none;border:none;color:white;font-size:18px;cursor:pointer;margin-left:15px; }
        .cke_notification{display:none!important;}

        /* Added for error toasts */
        .toast.error { background: #dc3545; }
        .toast.success { background: #28a745; }
    </style>

    <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            CKEDITOR.replace('app_description', { height: 300 });

            // Logo preview
            document.getElementById('fileupload').addEventListener('change', function (e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('logo_preview').setAttribute('src', e.target.result);
                        updateNavbarLogo(e.target.result);
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            // Update app name live
            document.getElementById('app_name').addEventListener('input', function () {
                updateNavbarAppName(this.value);
            });

            // Common AJAX submit handler without page reload
            function ajaxForm(formId, url, successMsg, extraCb) {
                document.getElementById(formId).addEventListener('submit', function(e){
                    e.preventDefault();
                    var formData = new FormData(this);
                    if (formId === 'app_settings_form') {
                        formData.set('app_description', CKEDITOR.instances.app_description.getData());
                    }

                    fetch(url, { method: "POST", body: formData })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === "success") {
                                showToast(successMsg);
                                if (extraCb) extraCb();

                                // If there's returned data, update the form fields
                                if (data.settings) {
                                    updateFormFields(formId, data.settings);
                                }
                            } else {
                                showToast("Error: " + data.message, "error");
                            }
                        })
                        .catch(error => {
                            showToast("Network error: " + error, "error");
                        });
                });
            }

            // Function to update form fields with new data
            function updateFormFields(formId, settings) {
                const form = document.getElementById(formId);
                const inputs = form.querySelectorAll('input, textarea, select');

                inputs.forEach(input => {
                    const fieldName = input.name;
                    if (settings[fieldName] !== undefined) {
                        if (input.type === 'checkbox' || input.type === 'radio') {
                            input.checked = settings[fieldName] === input.value;
                        } else if (input.type === 'file') {
                            // Skip file inputs
                        } else {
                            input.value = settings[fieldName];
                        }
                    }
                });

                // Special handling for CKEditor
                if (formId === 'app_settings_form' && settings.app_description !== undefined) {
                    CKEDITOR.instances.app_description.setData(settings.app_description);
                }

                // Update logo preview if logo was changed
                if (formId === 'app_settings_form' && settings.app_logo !== undefined) {
                    document.getElementById('logo_preview').setAttribute('src',
                        '<?= base_url() ?>' + settings.app_logo);
                    updateNavbarLogo('<?= base_url() ?>' + settings.app_logo);
                }

                // Update app name in navbar if changed
                if (formId === 'app_settings_form' && settings.app_name !== undefined) {
                    updateNavbarAppName(settings.app_name);
                }
            }

            ajaxForm('app_settings_form', "<?= site_url('settings/saveAppSettings') ?>", "App settings saved successfully!", function(){
                updateNavbarAppName(document.getElementById('app_name').value);
            });
            ajaxForm('admob_settings_form', "<?= site_url('settings/saveAdmobSettings') ?>", "Admob settings saved successfully!");
            ajaxForm('notification_settings_form', "<?= site_url('settings/saveNotificationSettings') ?>", "Notification settings saved successfully!");
            ajaxForm('api_keys_form', "<?= site_url('settings/saveApiKeys') ?>", "API keys saved successfully!");

            function updateNavbarLogo(logoData) {
                const navbarLogo = document.querySelector('.brand-link img');
                if (navbarLogo) navbarLogo.setAttribute('src', logoData);
            }

            function updateNavbarAppName(appName) {
                const navbarAppName = document.querySelector('.brand-text');
                if (navbarAppName) navbarAppName.textContent = appName;
                document.title = appName + ' - Settings';
            }


        });
    </script>


    <div id="toast-container"></div>

    <style>
        #toast-container {
            position: fixed;
            top: 20px;
            right: -400px;
            z-index: 9999;
            transition: right 0.6s ease-in-out;
        }
        .toast-message {
            background: #000;
            color: #fff;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 6px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
            min-width: 250px;
            font-size: 14px;
            font-weight: bold;
            opacity: 0.95;
        }
    </style>

    <script>
        function showToast(message) {
            let container = document.getElementById("toast-container");
            let toast = document.createElement("div");
            toast.className = "toast-message";
            toast.innerText = message;

            container.appendChild(toast);
            container.style.right = "20px"; // slide in

            setTimeout(function () {
                toast.style.opacity = "0";
                setTimeout(function(){
                    toast.remove();
                    if (container.children.length === 0) {
                        container.style.right = "-400px"; // slide out
                    }
                }, 500);
            }, 3000);
        }
    </script>

<?php if(session()->getFlashdata('success')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            showToast("<?= session()->getFlashdata('success') ?>");
        });
    </script>
<?php endif; ?>

<?= $this->endSection() ?>