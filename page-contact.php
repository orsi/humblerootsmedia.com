<?php
  $status = get_post_meta( $post->ID, 'humblerootsmedia_intro-text', true );

  if ( isset($_POST['action']) ) {
    $name = $_POST['name_full'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $enquiry = $_POST['enquiryType'];
    $message = $_POST['message'];

    $to = 'jonathon.orsi@gmail.com';
    $subject = 'New Email from Humble Roots Media Website';
    $msg = 'This message is being sent to you through the Humble Roots Media website.<br><br>'
          .'From: ' . $name . '<br>'
          .'Email: ' . $email . '<br>'
          .'Phone: ' . $phone . '<br>'
          .'Enquiry: ' . $enquiry . '<br>'
          .'Message: ' .$message . '<br><br>'
	  .'Reply to the email address given in the information above. Replies to this email will not be received by the person who sent this message.';
//    $headers = 'From: Wordpress <wordpress@jonorsi.com>' . '\r\n';

    if ( wp_mail($to, $subject, $msg) ) {
      $status = 'Thank you for contacting us. We\'ll get back to you shortly.';
    }
    else {
      $status = 'We\'re super sorry, but we couldn\'t send your message! Try again, or send to us directly via hello@humblerootsmedia.com.';
    }
  }

  get_header();
  $thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
  <div class="nav-pad"></div>
<main id="main">
  <aside class="break text-center">
    <div class="container-md">
      <p><?php
        echo $status;
      ?></p>
    </div>
  </aside>

  <section class="content contact-form">
    <div class="container-lg">
      <form method="post">
        <input type="hidden" name="action" value="contact">
        <label>
          <input type="text" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue" name="name.full" value="Your Name">
        </label>
        <label>
          <input type="email" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue" value="Your email" name="email">
        </label>
        <label>
          <input type="text" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue" value="Your contact number" name="phone">
        </label>
        <label>
          <select name="enquiryType">
            <option selected disabled>What are you contacting us about?</option>
            <option value="message">Just leaving a message</option>
            <option value="question">I've got a question</option>
            <option value="other">Something else...</option>
          </select>
        </label>
        <label>
          <textarea name="message" onfocus="if(this.value == this.defaultValue) this.value = ''" onblur="if(this.value == '') this.value = this.defaultValue">Tell us a bit about yourself</textarea>
        </label>
        <button type="submit">Send</button>
      </form>
    </div>
  </section>
</main>
<?php
  get_footer();
