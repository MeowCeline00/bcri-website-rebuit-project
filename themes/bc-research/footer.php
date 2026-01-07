<?php
// Security
if (!defined('ABSPATH')) exit;
?>
</div>

<footer class="site-footer">
  <div class="site-footer__content">
    <div class="site-footer__logo-row">
      <a class="site-footer__logo-link" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/BCRESEARCH-logo-white-version.png" alt="BC Research">
      </a>
      <span class="site-footer__logo-divider" aria-hidden="true"></span>
      <a class="site-footer__logo-link" href="https://www.noram-eng.com" target="_blank" rel="noopener">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/NORAM-logo-white-version.png" alt="NORAM">
      </a>
    </div>

    <div class="site-footer__grid">
      <div class="site-footer__col">
        <ul class="site-footer__list">
          <li><a href="/">Home</a></li>
          <li><a href="/about">About Us</a></li>
          <li><a href="/our-people">Our People</a></li>
          <li><a href="/news">News</a></li>
        </ul>
        <h4 class="site-footer__heading">Core Research Areas</h4>
        <ul class="site-footer__list">
          <li><a href="/biobased-products">Biobased Products</a></li>
          <li><a href="/multiphase-chemical-processing">Multiphase Chemical Processing</a></li>
          <li><a href="/extreme-industrial-chemistry">Extreme Industrial Chemistry</a></li>
          <li><a href="/hydrogen-separation">Hydrogen Separation and Hydrogen Processes</a></li>
        </ul>
      </div>

      <div class="site-footer__col">
        <h4 class="site-footer__heading">Facilities</h4>
        <ul class="site-footer__list">
          <li><a href="/laboratory">Laboratory</a></li>
          <li><a href="/analytical-laboratory">Analytical Laboratory</a></li>
          <li><a href="/pilot-plant">Pilot Plant</a></li>
        </ul>
        <h4 class="site-footer__heading">Services</h4>
        <ul class="site-footer__list">
          <li><a href="/research-development">Research and Development</a></li>
          <li><a href="/piloting">Piloting</a></li>
        </ul>
        <h4 class="site-footer__heading">Resources</h4>
        <ul class="site-footer__list">
          <li><a href="/careers">Careers</a></li>
        </ul>
      </div>

      <div class="site-footer__divider" aria-hidden="true"></div>

      <div class="site-footer__col site-footer__contact">
        <div class="site-footer__contact-item">
          <span class="site-footer__icon" aria-hidden="true">☎</span>
          <div>
            <strong>Call Us at:</strong>
            <a href="tel:+16044153570">+1-604-415-3570</a>
          </div>
        </div>
        <div class="site-footer__contact-item">
          <span class="site-footer__icon" aria-hidden="true">✉</span>
          <div>
            <strong>Email Us at:</strong>
            <a href="mailto:info@bcri.ca">info@bcri.ca</a>
          </div>
        </div>
        <div class="site-footer__contact-item">
          <span class="site-footer__icon" aria-hidden="true">📍</span>
          <div>
            <strong>Visit Us at:</strong>
            <span>BC Research Inc.</span>
            <span>12920 Mitchell Road</span>
            <span>Richmond, BC</span>
            <span>V6V 1M8 Canada</span>
          </div>
        </div>
        <a class="site-footer__cta" href="/contact">Contact Us</a>
        <a class="site-footer__linkedin" href="https://www.linkedin.com" aria-label="LinkedIn">in</a>
      </div>
    </div>
  </div>
</footer>

<div class="site-footer__copyright">
  © 2025 BC Research Inc. All Rights Reserved
</div>

<?php wp_footer(); ?>
</body>
</html>
