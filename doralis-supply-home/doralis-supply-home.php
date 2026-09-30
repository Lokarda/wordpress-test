<?php
/**
 * Plugin Name: Doralis Supply Home
 * Description: Dodaje shortcodeove [pozdrav] i [doralis_pocetna] za profesionalnu Doralis Supply početnu stranicu.
 * Version: 1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * License: GPL-2.0-or-later
 * Text Domain: doralis-supply-home
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the greeting displayed by the [pozdrav] shortcode.
 *
 * @return string
 */
function moj_prvi_plugin_pozdrav_shortcode() {
	return esc_html__( 'Pozdrav iz mog prvog WordPress plugina!', 'doralis-supply-home' );
}

add_shortcode( 'pozdrav', 'moj_prvi_plugin_pozdrav_shortcode' );

/**
 * Loads the Doralis Supply landing-page styles.
 *
 * @return void
 */
function moj_prvi_plugin_enqueue_doralis_styles() {
	wp_enqueue_style(
		'doralis-supply-home',
		plugin_dir_url( __FILE__ ) . 'assets/css/doralis-home.css',
		array(),
		'1.0'
	);
}
add_action( 'wp_enqueue_scripts', 'moj_prvi_plugin_enqueue_doralis_styles' );

/**
 * Returns the status message for the Doralis Supply contact form.
 *
 * @return string
 */
function moj_prvi_plugin_doralis_form_notice() {
	if ( empty( $_GET['doralis_status'] ) ) {
		return '';
	}

	$status = sanitize_key( wp_unslash( $_GET['doralis_status'] ) );

	if ( 'success' === $status ) {
		return '<div class="doralis-notice doralis-notice--success" role="status">Hvala na upitu. Javit ćemo vam se u najkraćem mogućem roku.</div>';
	}

	return '<div class="doralis-notice doralis-notice--error" role="alert">Upit nije poslan. Provjerite unesene podatke i pokušajte ponovno.</div>';
}

/**
 * Renders the Doralis Supply homepage.
 *
 * @return string
 */
function moj_prvi_plugin_doralis_homepage_shortcode() {
	$horse_hero_image = 'https://images.unsplash.com/photo-1517887121-557af22472e1?auto=format&fit=crop&w=2000&q=88';
	$horse_image      = 'https://images.unsplash.com/photo-1553284965-83fd3e82fa5a?auto=format&fit=crop&w=1200&q=85';
	$dog_image        = 'https://images.unsplash.com/photo-1552053831-71594a27632d?auto=format&fit=crop&w=1200&q=85';

	ob_start();
	?>
	<main class="doralis-home">
		<section class="doralis-hero" aria-labelledby="doralis-hero-title">
			<img class="doralis-hero__image" src="<?php echo esc_url( $horse_hero_image ); ?>" alt="Elegantan smeđi konj, simbol snage i vitalnosti" fetchpriority="high">
			<div class="doralis-hero__overlay" aria-hidden="true"></div>
			<div class="doralis-shell doralis-hero__content">
				<p class="doralis-eyebrow">Premium njega iznutra</p>
				<h1 id="doralis-hero-title">Snaga za svaki korak.<br>Vitalnost za svaki dan.</h1>
				<p class="doralis-hero__lead">Pažljivo odabrani premium dodaci prehrani za konje i pse — za vlasnike koji kvalitetu ne prepuštaju slučaju.</p>
				<div class="doralis-actions">
					<a class="doralis-button doralis-button--primary" href="#doralis-proizvodi">Istražite proizvode</a>
					<a class="doralis-button doralis-button--ghost" href="#doralis-kontakt">Zatražite preporuku</a>
				</div>
			</div>
			<div class="doralis-shell doralis-hero__proof" aria-label="Vrijednosti Doralis Supply ponude">
				<div><strong>Premium</strong><span>pažljivo odabran asortiman</span></div>
				<div><strong>Ciljano</strong><span>rješenja za stvarne potrebe</span></div>
				<div><strong>Odgovorno</strong><span>dobrobit životinja na prvom mjestu</span></div>
			</div>
		</section>

		<section class="doralis-section doralis-benefits" aria-labelledby="doralis-benefits-title">
			<div class="doralis-shell">
				<div class="doralis-heading doralis-heading--center">
					<p class="doralis-eyebrow doralis-eyebrow--dark">Zašto Doralis Supply</p>
					<h2 id="doralis-benefits-title">Kvaliteta koju birate za one koji vam znače najviše</h2>
					<p>Jednostavniji odabir, jasne informacije i proizvodi usmjereni na svakodnevnu dobrobit vašeg konja ili psa.</p>
				</div>
				<div class="doralis-benefits__grid">
					<article class="doralis-benefit">
						<span class="doralis-benefit__number">01</span>
						<h3>Kvaliteta bez kompromisa</h3>
						<p>Biramo proizvode promišljenog sastava i premium standarda, prikladne za odgovornu svakodnevnu rutinu.</p>
					</article>
					<article class="doralis-benefit">
						<span class="doralis-benefit__number">02</span>
						<h3>Ciljane formule</h3>
						<p>Od pokretljivosti i probave do kože, dlake i opće vitalnosti — fokus je uvijek na konkretnoj potrebi.</p>
					</article>
					<article class="doralis-benefit">
						<span class="doralis-benefit__number">03</span>
						<h3>Transparentan pristup</h3>
						<p>Jasno predstavljene namjene i sastojci pomažu vam donijeti informiranu odluku bez nepotrebne složenosti.</p>
					</article>
					<article class="doralis-benefit">
						<span class="doralis-benefit__number">04</span>
						<h3>Osobna podrška</h3>
						<p>Niste sigurni što odabrati? Saslušat ćemo vas i pomoći suziti izbor prema potrebama vaše životinje.</p>
					</article>
				</div>
			</div>
		</section>

		<section id="doralis-proizvodi" class="doralis-section doralis-products" aria-labelledby="doralis-products-title">
			<div class="doralis-shell">
				<div class="doralis-heading doralis-heading--split">
					<div>
						<p class="doralis-eyebrow doralis-eyebrow--dark">Istaknute kategorije</p>
						<h2 id="doralis-products-title">Podrška prilagođena njihovom ritmu</h2>
					</div>
					<p>Pronađite dodatak prehrani prema cilju koji želite podržati. Za specifične potrebe preporučujemo savjetovanje s veterinarom.</p>
				</div>
				<div class="doralis-products__grid">
					<article class="doralis-product doralis-product--forest">
						<div class="doralis-product__visual" aria-hidden="true"><span>DS</span></div>
						<div class="doralis-product__body">
							<span class="doralis-tag">Konji</span>
							<h3>Zglobovi i pokretljivost</h3>
							<p>Formule osmišljene kao nutritivna podrška pokretljivosti, fleksibilnosti i aktivnom životu konja.</p>
							<a href="#doralis-kontakt">Zatražite preporuku <span aria-hidden="true">→</span></a>
						</div>
					</article>
					<article class="doralis-product doralis-product--sand">
						<div class="doralis-product__visual" aria-hidden="true"><span>DS</span></div>
						<div class="doralis-product__body">
							<span class="doralis-tag">Konji</span>
							<h3>Probava i dnevna ravnoteža</h3>
							<p>Dodaci prehrani za podršku uravnoteženoj probavi, svakodnevnoj kondiciji i kvalitetnoj prehrambenoj rutini.</p>
							<a href="#doralis-kontakt">Zatražite preporuku <span aria-hidden="true">→</span></a>
						</div>
					</article>
					<article class="doralis-product doralis-product--rose">
						<div class="doralis-product__visual" aria-hidden="true"><span>DS</span></div>
						<div class="doralis-product__body">
							<span class="doralis-tag">Psi</span>
							<h3>Koža, dlaka i vitalnost</h3>
							<p>Odabrane formule za svakodnevnu podršku sjajnoj dlaci, njegovanoj koži i općoj vitalnosti psa.</p>
							<a href="#doralis-kontakt">Zatražite preporuku <span aria-hidden="true">→</span></a>
						</div>
					</article>
				</div>
			</div>
		</section>

		<section class="doralis-section doralis-about" aria-labelledby="doralis-about-title">
			<div class="doralis-shell doralis-about__grid">
				<div class="doralis-about__media">
					<img src="<?php echo esc_url( $dog_image ); ?>" alt="Zdrav i zadovoljan pas na otvorenom" loading="lazy">
					<img src="<?php echo esc_url( $horse_image ); ?>" alt="Konj na pašnjaku" loading="lazy">
					<div class="doralis-about__seal" aria-hidden="true"><span>D</span><small>SUPPLY</small></div>
				</div>
				<div class="doralis-about__content">
					<p class="doralis-eyebrow doralis-eyebrow--dark">O nama</p>
					<h2 id="doralis-about-title">Njihova dobrobit.<br>Naša svakodnevna misija.</h2>
					<p class="doralis-about__lead">Doralis Supply nastao je iz uvjerenja da kvalitetna briga počinje dobrim izborom.</p>
					<p>Na jednom mjestu okupljamo premium dodatke prehrani za konje i pse te vlasnicima pružamo jasan, pouzdan i osoban pristup. Ne nudimo univerzalna obećanja — pomažemo vam pronaći rješenje koje odgovara stvarnoj potrebi i svakodnevici vaše životinje.</p>
					<div class="doralis-quote">„Premium njega nije luksuz. To je dosljedna odluka da im svakoga dana pružimo najbolje što možemo.”</div>
				</div>
			</div>
		</section>

		<section id="doralis-kontakt" class="doralis-contact" aria-labelledby="doralis-contact-title">
			<div class="doralis-shell doralis-contact__grid">
				<div class="doralis-contact__intro">
					<p class="doralis-eyebrow">Kontakt</p>
					<h2 id="doralis-contact-title">Pronađimo pravi izbor zajedno.</h2>
					<p>Opišite nam potrebe, dob i razinu aktivnosti vašeg konja ili psa. Javit ćemo vam se s informacijama koje će vam olakšati sljedeći korak.</p>
					<div class="doralis-contact__note"><span aria-hidden="true">✦</span> Za zdravstvena stanja i terapiju uvijek se prethodno posavjetujte s veterinarom.</div>
				</div>
				<div class="doralis-contact__form-wrap">
					<?php echo wp_kses_post( moj_prvi_plugin_doralis_form_notice() ); ?>
					<form class="doralis-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
						<input type="hidden" name="action" value="doralis_contact">
						<?php wp_nonce_field( 'doralis_contact_form', 'doralis_nonce' ); ?>
						<div class="doralis-honeypot" aria-hidden="true">
							<label for="doralis-website">Web-stranica</label>
							<input id="doralis-website" name="doralis_website" type="text" tabindex="-1" autocomplete="off">
						</div>
						<div class="doralis-form__row">
							<label>Ime i prezime<input name="doralis_name" type="text" autocomplete="name" required></label>
							<label>E-mail adresa<input name="doralis_email" type="email" autocomplete="email" required></label>
						</div>
						<label>Za koga tražite dodatak?
							<select name="doralis_animal" required>
								<option value="">Odaberite</option>
								<option value="Konj">Za konja</option>
								<option value="Pas">Za psa</option>
							</select>
						</label>
						<label>Kako vam možemo pomoći?<textarea name="doralis_message" rows="5" required placeholder="Opišite dob, aktivnost i potrebe životinje..."></textarea></label>
						<button class="doralis-button doralis-button--primary" type="submit">Pošaljite upit</button>
						<p class="doralis-form__privacy">Slanjem upita pristajete da unesene podatke koristimo isključivo za odgovor na vaš upit.</p>
					</form>
				</div>
			</div>
		</section>
	</main>
	<?php
	return ob_get_clean();
}
add_shortcode( 'doralis_pocetna', 'moj_prvi_plugin_doralis_homepage_shortcode' );

/**
 * Processes the Doralis Supply contact form and emails the site administrator.
 *
 * @return void
 */
function moj_prvi_plugin_handle_doralis_contact() {
	$redirect_url = wp_get_referer() ? wp_get_referer() : home_url( '/' );
	$redirect_url = remove_query_arg( 'doralis_status', $redirect_url );

	if (
		empty( $_POST['doralis_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['doralis_nonce'] ) ), 'doralis_contact_form' ) ||
		! empty( $_POST['doralis_website'] )
	) {
		wp_safe_redirect( add_query_arg( 'doralis_status', 'error', $redirect_url ) . '#doralis-kontakt' );
		exit;
	}

	$name    = isset( $_POST['doralis_name'] ) ? sanitize_text_field( wp_unslash( $_POST['doralis_name'] ) ) : '';
	$email   = isset( $_POST['doralis_email'] ) ? sanitize_email( wp_unslash( $_POST['doralis_email'] ) ) : '';
	$animal  = isset( $_POST['doralis_animal'] ) ? sanitize_text_field( wp_unslash( $_POST['doralis_animal'] ) ) : '';
	$message = isset( $_POST['doralis_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['doralis_message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || ! in_array( $animal, array( 'Konj', 'Pas' ), true ) || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'doralis_status', 'error', $redirect_url ) . '#doralis-kontakt' );
		exit;
	}

	$subject = sprintf( 'Novi Doralis Supply upit — %s', $name );
	$body    = sprintf(
		"Ime i prezime: %s\nE-mail: %s\nŽivotinja: %s\n\nPoruka:\n%s",
		$name,
		$email,
		$animal,
		$message
	);
	$headers = array( sprintf( 'Reply-To: %s <%s>', $name, $email ) );
	$sent    = wp_mail( get_option( 'admin_email' ), $subject, $body, $headers );
	$status  = $sent ? 'success' : 'error';

	wp_safe_redirect( add_query_arg( 'doralis_status', $status, $redirect_url ) . '#doralis-kontakt' );
	exit;
}
add_action( 'admin_post_nopriv_doralis_contact', 'moj_prvi_plugin_handle_doralis_contact' );
add_action( 'admin_post_doralis_contact', 'moj_prvi_plugin_handle_doralis_contact' );
