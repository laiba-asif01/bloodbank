<?=$this->extend('adminpannel/layouts/structure')?>
<?=$this->section('title')?>
    Privacy Policy
<?=$this->endsection()?>
<?=$this->section('content')?>

    <div class="content-wrapper" style="min-height: 119.698px;">

        <div class="col-md-12 pt-2">


        </div>

        <!-- Main content -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard <small>Privacy Policy</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="http://bloodbankv3.almahirhub.com/">Home</a></li>
                            <li class="breadcrumb-item"><a href="http://bloodbankv3.almahirhub.com/admin/settings">Settings</a></li>
                            <li class="breadcrumb-item active">Privacy</li>
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

                            <li class="nav-item">
                                <a class="nav-link" href="/settings">App Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/privacypolicy">App Privacy Policy</a>
                            </li>

                        </ul>
                    </div>

                    <div class="card-body">
                        <form action="/privacy_policy" name="api_privacy_policy" method="post" class="form form-horizontal" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-md-2 control-label">App Privacy Policy :-</label>
                                <div class="col-md-10">
<textarea name="app_privacy_policy" id="Editor" class="form-control" style="visibility: hidden; display: none;">&lt;p&gt;&lt;strong&gt;We are committed to protecting your privacy&lt;/strong&gt;&lt;/p&gt;

&lt;p&gt;We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information.&nbsp;&lt;/p&gt;

&lt;p&gt;&lt;strong&gt;Information Collected&lt;/strong&gt;&lt;/p&gt;

&lt;p&gt;We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.&lt;/p&gt;

&lt;p&gt;&lt;strong&gt;Information Use&lt;/strong&gt;&lt;/p&gt;

&lt;p&gt;We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.&lt;/p&gt;

&lt;p&gt;&lt;strong&gt;Cookies&lt;/strong&gt;&lt;/p&gt;

&lt;p&gt;Your Internet browser has the in-built facility for storing small files - "cookies" - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.&lt;/p&gt;

&lt;p&gt;&lt;strong&gt;Disclosing Information&lt;/strong&gt;&lt;/p&gt;

&lt;p&gt;We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent.&nbsp;&lt;/p&gt;

&lt;p&gt;We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals.&nbsp;&lt;/p&gt;

&lt;p&gt;In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.&lt;/p&gt;

&lt;p&gt;&lt;strong&gt;Changes to this Policy&lt;/strong&gt;&lt;/p&gt;

&lt;p&gt;Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.&lt;/p&gt;

&lt;p&gt;&lt;strong&gt;Contacting Us&lt;/strong&gt;&lt;/p&gt;

&lt;p&gt;If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at hd@dummy.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.&lt;/p&gt;
</textarea>
                                    <!--                                <script type="application/javascript">-->
                                    <!--                                    jQuery(function () {-->
                                    <!--                                        // CKEDITOR.replace('privacy_policy');-->
                                    <!--                                    });-->
                                    <!--                                </script>-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10 offset-2">
                                    <button type="submit" name="app_pri_poly" class="btn btn-block btn-info">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>


    <style>
        .cke_notification {
            display: none !important;
        }
    </style>

    <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            CKEDITOR.replace('Editor', {
                height: 300
            });
        });
    </script>



<?=$this->endsection()?>