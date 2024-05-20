<?php
session_start();
error_reporting(1);

$db_config_path = '../application/config/database.php';

if (!isset($_SESSION["license_code"])) {
    $_SESSION["error"] = "Invalid purchase code!";
    header("Location: index.php");
    exit();
}

if (isset($_POST["btn_admin"])) {

    $_SESSION["db_host"] = $_POST['db_host'];
    $_SESSION["db_name"] = $_POST['db_name'];
    $_SESSION["db_user"] = $_POST['db_user'];
    $_SESSION["db_password"] = $_POST['db_password'];


    /* Database Credentials */
    defined("DB_HOST") ? null : define("DB_HOST", $_SESSION["db_host"]);
    defined("DB_USER") ? null : define("DB_USER", $_SESSION["db_user"]);
    defined("DB_PASS") ? null : define("DB_PASS", $_SESSION["db_password"]);
    defined("DB_NAME") ? null : define("DB_NAME", $_SESSION["db_name"]);

    /* Connect */
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $connection->query("SET CHARACTER SET utf8");
    $connection->query("SET NAMES utf8");

    /* check connection */
    if (mysqli_connect_errno()) {
        $error = 0;
    } else {
        
        mysqli_query($connection, "UPDATE settings SET version = '2.2' WHERE id = 1;");
        
        mysqli_query($connection, "ALTER TABLE `business` ADD `about_title` VARCHAR(255) NULL AFTER `holidays`, ADD `about_details` TEXT NULL AFTER `about_title`, ADD `company_established` VARCHAR(155) NULL AFTER `about_details`, ADD `about_image` VARCHAR(255) NULL AFTER `company_established`, ADD `about_vedio_url` VARCHAR(255) NULL AFTER `about_image`;");

        mysqli_query($connection, "ALTER TABLE `testimonials` ADD `type` VARCHAR(255) NOT NULL AFTER `user_id`;");

        mysqli_query($connection, "ALTER TABLE `testimonials` CHANGE `type` `business_id` VARCHAR(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL;");

        mysqli_query($connection, "ALTER TABLE `blog_category` ADD `business_id` VARCHAR(255) NOT NULL AFTER `user_id`;");

        mysqli_query($connection, "ALTER TABLE `blog_posts` ADD `business_id` VARCHAR(255) NOT NULL AFTER `lang_id`;");

        mysqli_query($connection, "ALTER TABLE `service_category` ADD `icon` VARCHAR(255) NULL AFTER `name`, ADD `image` VARCHAR(255) NULL AFTER `icon`;");

        mysqli_query($connection, "ALTER TABLE `service_category` ADD `is_active` INT NOT NULL DEFAULT '1' AFTER `image`;");

        mysqli_query($connection, "ALTER TABLE `staffs` ADD `designation` VARCHAR(255) NOT NULL AFTER `name`;");

        mysqli_query($connection, "ALTER TABLE `staffs` ADD `facebook` VARCHAR(255) NULL AFTER `phone`, ADD `twitter` VARCHAR(255) NULL AFTER `facebook`, ADD `linkedin` VARCHAR(255) NULL AFTER `twitter`, ADD `whatsapp` VARCHAR(255) NULL AFTER `linkedin`;");

        mysqli_query($connection, "ALTER TABLE `contacts` ADD `business_id` VARCHAR(255) NULL AFTER `user_id`;");

        mysqli_query($connection, "ALTER TABLE `contacts` ADD `website` VARCHAR(255) NULL AFTER `email`;");

        mysqli_query($connection, "ALTER TABLE `contacts` ADD `phone` VARCHAR(255) NULL AFTER `name`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `enable_portfolio` VARCHAR(255) NULL DEFAULT '1' AFTER `enable_gallery`, ADD `enable_brand` VARCHAR(255) NULL DEFAULT '1' AFTER `enable_portfolio`, ADD `enable_slider` VARCHAR(255) NULL DEFAULT '1' AFTER `enable_brand`, ADD `enable_blog` VARCHAR(255) NULL DEFAULT '1' AFTER `enable_slider`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `enable_testimonial` VARCHAR(255) NULL DEFAULT '1' AFTER `enable_blog`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `font` VARCHAR(255) NULL AFTER `color`;");

        mysqli_query($connection, "ALTER TABLE `settings` ADD `enable_embed_badge` VARCHAR(11) NULL DEFAULT '0' AFTER `enable_cdomain`, ADD `enable_default_tzone` VARCHAR(11) NULL DEFAULT '0' AFTER `enable_embed_badge`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `terms` LONGTEXT NULL DEFAULT NULL AFTER `about_vedio_url`, ADD `privacy` LONGTEXT NULL DEFAULT NULL AFTER `terms`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `tax_type` VARCHAR(255) NULL AFTER `privacy`, ADD `tax_amount` INT NULL AFTER `tax_type`;");

        mysqli_query($connection, "ALTER TABLE `services` ADD `tax` INT NULL AFTER `price`;");

        mysqli_query($connection, "ALTER TABLE `settings` ADD `enable_whatsapp_msg` INT NULL DEFAULT '0' AFTER `twillo_number`, ADD `ultramsg_instance_id` VARCHAR(155) NULL AFTER `enable_whatsapp_msg`, ADD `ultramsg_token` VARCHAR(155) NULL AFTER `ultramsg_instance_id`;");

        mysqli_query($connection, "ALTER TABLE `settings` ADD `global_twilio` INT NULL DEFAULT '0' AFTER `ultramsg_token`, ADD `global_ultramsg` INT NULL DEFAULT '0' AFTER `global_twilio`;");

        mysqli_query($connection, "ALTER TABLE `business` ADD `size` VARCHAR(55) NULL DEFAULT '120px' AFTER `logo`;");

       


        // import database table
        $query = '';
          $sqlScript = file('sql/sliders.sql');
          foreach ($sqlScript as $line) {
            
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
              continue;
            }
              
            $query = $query . $line;
            if ($endWith == ';') {
              mysqli_query($connection, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
              $query= '';   
            }
        }


        // import database table
        $query = '';
          $sqlScript = file('sql/portfolios.sql');
          foreach ($sqlScript as $line) {
            
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
              continue;
            }
              
            $query = $query . $line;
            if ($endWith == ';') {
              mysqli_query($connection, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
              $query= '';   
            }
        }

        // import database table
        $query = '';
          $sqlScript = file('sql/fonts.sql');
          foreach ($sqlScript as $line) {
            
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
              continue;
            }
              
            $query = $query . $line;
            if ($endWith == ';') {
              mysqli_query($connection, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
              $query= '';   
            }
        }



        mysqli_query($connection, "INSERT INTO `lang_values` (`type`, `label`, `keyword`, `english`) VALUES
        ('user', 'Upload About Image', 'upload-about-image', 'Upload About Image'),
        ('user', 'About Company', 'about-company', 'About Company'),
        ('user', 'About Title', 'about-title', 'About Title'),
        ('user', 'Established In', 'established-in', 'Established In'),
        ('user', 'About Video Url', 'about-video-url', 'About Video Url'),
        ('user', 'About Details', 'about-details', 'About Details'),
        ('user', 'Brand', 'brand', 'Brand'),
        ('user', 'Slider', 'slider', 'Slider'),
        ('user', 'Icon', 'icon', 'Icon'),
        ('user', 'Icon Image', 'icon-image', 'Icon Image'),
        ('user', 'Category Image', 'category-image', 'Category Image'),
        ('user', 'Select Icon/Image', 'select-iconimage', 'Select Icon/Image'),
        ('user', 'Link', 'link', 'Link'),
        ('user', 'Brands', 'brands', 'Brands'),
        ('user', 'Sliders', 'sliders', 'Sliders'),
        ('user', 'Send message', 'send-message', 'Send message'),
        ('user', 'Logo', 'logo', 'Logo'),
        ('user', 'Portfolios', 'portfolios', 'Portfolios'),
        ('user', 'View', 'view', 'View'),
        ('user', 'Portfolio Category', 'portfolio-category', 'Portfolio Category'),
        ('user', 'Enable Portfolio', 'enable-portfolio', 'Enable Portfolio'),
        ('user', 'Enable to show portfolio option in home page', 'enable-portfolio-title', 'Enable to show portfolio option in home page'),
        ('user', 'Enable to show brand option in home page', 'enable-brand-title', 'Enable to show brand option in home page'),
        ('user', 'Enable Brand', 'enable-brand', 'Enable Brand'),
        ('user', 'Enable Slider', 'enable-slider', 'Enable Slider'),
        ('user', 'Enable to show slider option in home page', 'enable-slider-title', 'Enable to show slider option in home page'),
        ('user', 'Enable to show blog option in home page', 'enable-blog-title', 'Enable to show blog option in home page'),
        ('user', 'Enable Blog', 'enable-blog', 'Enable Blog'),
        ('user', 'Enable Testimonial', 'enable-testimonial', 'Enable Testimonial'),
        ('user', 'Enable to show testimonial option in home page', 'enable-testimonial-title', 'Enable to show testimonial option in home page'),
        ('user', 'Sort by Categories', 'sort-by-categories', 'Sort by Categories'),
        ('user', 'Fonts', 'fonts', 'Fonts'),
        ('user', 'Font Name', 'font-name', 'Font Name'),
        ('user', 'Color', 'color', 'Color'),
        ('user', 'Theme Color & Font', 'theme-color', 'Theme, Color & Font'),
        ('user', 'Themes', 'themes', 'Themes'),
        ('user', 'Manage Fonts', 'manage-fonts', 'Manage Fonts'),
        ('user', 'Overview', 'overview', 'Overview'),
        ('user', 'Rating & Review', 'rating-review', 'Rating & Review'),
        ('user', 'Google Fonts', 'google-fonts', 'Google Fonts'),
        ('user', 'Get New Font', 'get-new-font', 'Get New Font'),
        ('user', 'Custom Font', 'custom-font', 'Custom Font'),
        ('user', 'Default', 'default', 'Default'),
        ('user', 'About us', 'about-us', 'About us'),
        ('user', 'Happy Clients', 'happy-clients', 'Happy Clients'),
        ('user', 'Schedule', 'schedule', 'Schedule'),
        ('user', 'Closed', 'closed', 'Closed'),
        ('user', 'What We Offer', 'what-we-offer', 'What We Offer'),
        ('user', 'What we do', 'what-we-do', 'What we do'),
        ('user', 'Our Services', 'our-services', 'Our Services'),
        ('user', 'Meet Our Specialists', 'meet-our-specialists', 'Meet Our Specialists'),
        ('user', 'What our client says about ', 'what-our-client-says-about', 'What our client says about '),
        ('user', 'Ready to book our Service?', 'ready-to-book-our-service', 'Ready to book our Service?'),
        ('user', 'Our Best Services', 'our-best-services', 'Our Best Services'),
        ('user', 'Projects', 'projects', 'Projects'),
        ('user', 'Our Latest Portfolios', 'our-latest-portfolios', 'Our Latest Portfolios'),
        ('user', 'Our Team Members', 'our-team-members', 'Our Team Members'),
        ('user', 'Latest from our blog', 'latest-from-our-blog', 'Latest from our blog'),
        ('user', 'More blogs', 'more-blogs', 'More blogs'),
        ('user', 'Lets Talk', 'lets-talk', 'Lets Talk'),
        ('user', 'Request a Free Quote', 'request-a-free-quote', 'Request a Free Quote'),
        ('user', 'See Here', 'see-here', 'See Here'),
        ('user', 'E-mail', 'e-mail', 'E-mail'),
        ('user', 'Your Website', 'your-website', 'Your Website'),
        ('user', 'Your message here', 'your-message-here', 'Your message here'),
        ('user', 'We are available when you want', 'we-are-available-when-you-want', 'We are available when you want'),
        ('user', 'Find design inspiration. Share your work. Join the #1 creative community online.', 'find-design-inspiration.-share-your-work.-join-the-1-creative-community-online', 'Find design inspiration. Share your work. Join the #1 creative community online.'),
        ('user', 'What We Provide', 'what-we-provide', 'What We Provide'),
        ('user', 'Teams', 'teams', 'Teams'),
        ('user', 'Our Specialists', 'our-specialists', 'Our Specialists'),
        ('user', 'What peoples says about Us', 'what-peoples-says-about-us', 'What peoples says about Us'),
        ('user', 'Scince', 'scince', 'Scince'),
        ('user', 'What Customers say about us', 'what-customers-say-about-us', 'What Customers say about us'),
        ('user', 'What peoples say about our company', 'what-peoples-say-about-our-company', 'What peoples say about our company'),
        ('user', 'Want to book our Service?', 'want-to-book-our-service', 'Want to book our Service?'),
        ('user', 'Manage your bookings to click this', 'manage-your-bookings-to-click-this', 'Manage your bookings to click this'),
        ('user', 'Contact Info', 'contact-info', 'Contact Info'),
        ('user', 'Useful Links', 'useful-links', 'Useful Links'),
        ('user', 'Want to get a online consultation?', 'want-to-get-a-online-consultation', 'Want to get a online consultation?'),
        ('user', 'Themes', 'themes', 'Themes'),
        ('user', 'Theme Settings', 'theme-settings', 'Theme Settings'),
        ('user', 'Multipurpose One', 'multipurpose-one', 'Multipurpose One'),
        ('user', 'Multipurpose Two', 'multipurpose-two', 'Multipurpose Two'),
        ('user', 'Barbar / Stylists', 'barbar-stylists', 'Barbar / Stylists'),
        ('user', 'Agency / Law Consultancy', 'law-consultancy', 'Agency / Law Consultancy'),
        ('user', 'Medical / Health', 'medical-health', 'Medical / Health'),
        ('user', 'Beauty / Wellness', 'beauty-wellness', 'Beauty / Wellness'),
        ('user', 'Terms & Privacy', 'terms-privacy', 'Terms & Privacy'),
        ('user', 'Enable Default Time Zone', 'enable-default-time-zone', 'Default Time Zone'),
        ('user', 'Enable to activate default admin time zone for all users', 'default-time-zone-tiltle', 'Enable to activate default admin time zone for all users'),
        ('user', 'Enable Embded Powered By Badge', 'enable-embded-badge', 'Enable Embded Powered By Badge'),
        ('user', 'Enable to activate powered by badge on embedded booking page', 'embded-badge-tiltle', 'Enable to activate powered by badge on embedded booking page'),
        ('user', 'Tax Settings', 'tax-settings', 'Tax Settings'),
        ('user', 'Fixed Tax', 'fixed-tax', 'Fixed Tax'),
        ('user', 'Service based tax', 'service-based-tax', 'Service Based Tax'),
        ('user', 'Tax', 'tax', 'Tax'),
        ('user', 'Service Tax', 'service-tax', 'Service Tax'),
        ('user', 'Enable Globally', 'enable-globally', 'Enable Globally'),
        ('user', 'Enable to activate WhatsApp sms for admin and user side.', 'enable-globally-whatsapp', 'Enable to activate WhatsApp sms for admin and user side.'),
        ('user', 'Enable to activate Twilio sms for admin and user side.', 'enable-globally-twilio', 'Enable to activate Twilio sms for admin and user side.'),
        ('user', 'Instance Id', 'instance-id', 'Instance Id'),
        ('user', 'Ultramsg API', 'ultramsg-api', 'Ultramsg API'),
        ('user', 'Token', 'token', 'Token'),
        ('user', 'Sorry, Appointment is not available on that time', 'appointment-is-not-available-on-that-time', 'Sorry, Appointment is not available on that time'),
        ('user', 'Small Logo', 'small-logo', 'Small Logo'),
        ('user', 'Medium Logo', 'medium-logo', 'Medium Logo'),
        ('user', 'Large Logo', 'large-logo', 'Large Logo');");



        // import database table
        $query = '';
          $sqlScript = file('sql/brands.sql');
          foreach ($sqlScript as $line) {
            
            $startWith = substr(trim($line), 0 ,2);
            $endWith = substr(trim($line), -1 ,1);
            
            if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
              continue;
            }
              
            $query = $query . $line;
            if ($endWith == ';') {
              mysqli_query($connection, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
              $query= '';   
            }
        }

            
      /* close connection */
      mysqli_close($connection);

      $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://" . $_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
      $redir = str_replace('updates/v2.2/', '', $redir);
      header("refresh:5;url=" . $redir);
      $success = 1;
    }



}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aoxio &bull; Update Installer</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/libs/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,500,600,700&display=swap" rel="stylesheet">
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-md-offset-2">

                <div class="row">
                    <div class="col-sm-12 logo-cnt">
                        <p>
                           <img src="assets/img/logo.png" alt="">
                       </p>
                       <h1>Welcome to the update installer</h1>
                   </div>
               </div>

               <div class="row">
                <div class="col-sm-12">

                    <div class="install-box">

                        <div class="steps">
                            <div class="step-progress">
                                <div class="step-progress-line" data-now-value="100" data-number-of-steps="3" style="width: 100%;"></div>
                            </div>
                            <div class="step" style="width: 50%">
                                <div class="step-icon"><i class="fa fa-arrow-circle-right"></i></div>
                                <p>Start</p>
                            </div>
                            <div class="step active" style="width: 50%">
                                <div class="step-icon"><i class="fa fa-database"></i></div>
                                <p>Database</p>
                            </div>
                        </div>

                        <div class="messages">
                            <?php if (isset($message)) { ?>
                            <div class="alert alert-danger">
                                <strong><?php echo htmlspecialchars($message); ?></strong>
                            </div>
                            <?php } ?>
                            <?php if (isset($success)) { ?>
                            <div class="alert alert-success">
                                <strong>Completing Updates ... <i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> Please wait 5 second </strong>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="step-contents">
                            <div class="tab-1">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="tab-content">
                                        <div class="tab_1">
                                            <h1 class="step-title">Database</h1>
                                            <div class="form-group">
                                                <label for="email">Host</label>
                                                <input type="text" class="form-control form-input" name="db_host" placeholder="Host"
                                                value="<?php echo isset($_SESSION["db_host"]) ? $_SESSION["db_host"] : 'localhost'; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Database Name</label>
                                                <input type="text" class="form-control form-input" name="db_name" placeholder="Database Name" value="<?php echo @$_SESSION["db_name"]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Username</label>
                                                <input type="text" class="form-control form-input" name="db_user" placeholder="Username" value="<?php echo @$_SESSION["db_user"]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Password</label>
                                                <input type="password" class="form-control form-input" name="db_password" placeholder="Password" value="<?php echo @$_SESSION["db_password"]; ?>">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="buttons">
                                        <a href="index.php" class="btn btn-success btn-custom pull-left">Prev</a>
                                        <button type="submit" name="btn_admin" class="btn btn-success btn-custom pull-right">Finish</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>


    </div>


</div>

<?php

unset($_SESSION["error"]);
unset($_SESSION["success"]);

?>

</body>
</html>

