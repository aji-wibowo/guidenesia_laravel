<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc><?php echo url('/') ?></loc>
    <priority>1.0</priority>
    <changefreq>daily</changefreq>
  </url>

  <!-- Sitemap -->
  <?php foreach($post as $s) { ?>
  <url>
    <loc><?php echo url('spot').'/'.$s->slug_spot ?></loc>
   <lastmod><?php echo gmdate("Y-m-d\TH:i:s\Z", strtotime($s->updated_at)) ?></lastmod>
    <priority>0.5</priority>
    <changefreq>daily</changefreq>
  </url>
  <?php } ?>
</urlset>