<?php
// Fetch data from Theme options transient
$data = soiva_get_theme_options_transient();

$some_icons = [
  'facebook'  => [
    'title' => 'Facebook',
    'icon' => '<svg viewBox="0 0 24 24"><path d="M17 2v4h-2c-.69 0-1 .81-1 1.5V10h3v4h-3v8h-4v-8H7v-4h3V6a4 4 0 0 1 4-4h3z"/></svg>'
  ],
  'x'  => [
    'title' => 'X',
    'icon' => '<svg viewBox="0 0 24 24"><path class="st0" d="M13.7,11l6.7-7.8h-1.6L13,10L8.3,3.2H3l7,10.2l-7,8.2h1.6l6.1-7.1l4.9,7.1H21L13.7,11L13.7,11z M11.5,13.5 l-0.7-1L5.1,4.4h2.4l4.6,6.5l0.7,1l5.9,8.5h-2.4L11.5,13.5L11.5,13.5z"/></svg>'
  ],
  'linkedin'  => [
    'title' => 'LinkedIn',
    'icon' => '<svg viewBox="0 0 24 24"><path d="M21 21h-4v-6.75c0-1.06-1.19-1.94-2.25-1.94S13 13.19 13 14.25V21H9V9h4v2c.66-1.07 2.36-1.76 3.5-1.76 2.5 0 4.5 2.04 4.5 4.51V21M7 21H3V9h4v12M5 3a2 2 0 0 1 2 2 2 2 0 0 1-2 2 2 2 0 0 1-2-2 2 2 0 0 1 2-2z"/></svg>'
  ],
  'instagram'  => [
    'title' => 'Instagram',
    'icon' => '<svg viewBox="0 0 24 24"><path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/></svg>'
  ],
  'youtube'  => [
    'title' => 'YouTube',
    'icon' => '<svg viewBox="0 0 26 18"><path d="M25.6 3.9s.3 2.1.3 4.1v2c0 2.1-.3 4.1-.3 4.1s-.2 1.8-1 2.5c-1 1-2.1 1-2.6 1.1-3.6.3-8.9.3-8.9.3s-6.6-.1-8.7-.3c-.6-.1-1.8-.1-2.8-1.1-.8-.8-1-2.5-1-2.5S.3 12 .3 10V8c0-2.1.3-4.1.3-4.1s.2-1.8 1-2.5c1-1 2.1-1 2.6-1.1C7.8 0 13.1 0 13.1 0s5.3 0 8.9.3c.5.1 1.6.1 2.6 1.1.8.7 1 2.5 1 2.5zm-15.1 8.4l6.9-3.6-6.9-3.6v7.2z"/></svg>'
  ]
];

// Loop through data and create social media buttons
if (isset($data['social_media_links']) && $data['social_media_links']) :
  echo '<ul class="some-buttons">';
    foreach ($data['social_media_links'] as $row) :
      // assign $key from checkbox's current value
      $key = $row['social_media'];
      if (array_key_exists($key, $some_icons)) :
        ?>
        <li>
          <a href="<?= esc_url($row['social_media_url']); ?>" rel="noopener" target="_blank">
            <span class="screen-reader-text"><?= esc_attr(sprintf(__('Follow %s on', 'soiva'), get_bloginfo('name')) . ' ' . $some_icons[$key]['title']); ?></span>
            <?= $some_icons[$key]['icon']; ?>
          </a>
        </li>
        <?php
      endif;
    endforeach;
  echo '</ul>';
endif;
