<?php
/* Template Name: Contact Us */
get_header(); 

?>

<div class="content-area">
    <main>
    <div class="content-area">
    <main>
        
        <div class="page-content">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>

        <section class="contact-info-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/build/assets/Rami Request-03.jpg');">
            <h2>Contact Information</h2>
            <p>
                <i class="fas fa-map-marker-alt"></i> Address: Amazona BLDG, Industrial area- Zouk Mosbeh, Keserwan, Lebanon.
            </p>
            <p>
                <i class="fas fa-phone-alt"></i> Phone: 
                <a href="tel:+9619218654">+(961) 9218-656</a>
            </p>
            <p>
                <i class="fas fa-envelope"></i> Email: 
                <a href="mailto:info@amazonapaints.com">info@amazonapaints.com</a>
            </p>
        </section>

        <section class="submit-project-section">
            <h2>Submit a Project</h2>
            <p>Have a VIPER project you're proud of? We want to see it! Please share it along with any relevant images.</p>

            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_project'])) {
                // Sanitize input data
                $name = sanitize_text_field($_POST['name']);
                $email = sanitize_email($_POST['email']);
                $message = sanitize_textarea_field($_POST['message']);

                // Prepare attachments
                $attachments = [];
                if (!empty($_FILES['images']['name'][0])) {
                    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                        if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                            // Upload file to WordPress upload directory
                            $upload = wp_handle_upload(
                                [
                                    'name'     => $_FILES['images']['name'][$key],
                                    'type'     => $_FILES['images']['type'][$key],
                                    'tmp_name' => $tmp_name,
                                    'error'    => $_FILES['images']['error'][$key],
                                    'size'     => $_FILES['images']['size'][$key],
                                ],
                                ['test_form' => false]
                            );

                            if (isset($upload['file'])) {
                                $attachments[] = $upload['file'];
                            }
                        }
                    }
                }

                // Email settings
                $to = 'info@amazonapaints.com'; // Change this to your desired email address
                $subject = 'New Project Submission from ' . $name;
                $body = "Name: $name\nEmail: $email\nMessage:\n$message";
                $headers = ['Content-Type: text/plain; charset=UTF-8'];

                // Send email
                if (wp_mail($to, $subject, $body, $headers, $attachments)) {
                    echo '<p>Thank you for your submission! We have received your project.</p>';
                } else {
                    echo '<p>Submission failed. Please try again.</p>';
                }
            }
            ?>

<form id="projectForm" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit_project_form">

    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message</label>
    <textarea id="message" name="message" rows="5" required></textarea>

    <label for="images">Upload Images</label>
    <input type="file" id="images" name="images[]" accept="image/*" multiple>

    <button type="submit">Submit</button>
</form>

        </section>
    </main>
</div>
<script>

document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1') {
        alert('Thank you! Your message has been sent successfully.');
    } else if (urlParams.get('success') === '0') {
        alert('Oops! Something went wrong. Please try again.');
    }
});
</script>

<?php get_footer(); ?>


