<?php
date_default_timezone_set("Mexico/General");
setlocale(LC_ALL, "es_MX");
//Indicamos que el contenido es XML
header("Content-Type: application/xml");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=xmlexport.xml");

//Formato valido por Google
/*<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
  <url>
    <loc>http://www.example.com/foo.html</loc>
    <lastmod>2018-12-24T00:27:56+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.00</priority>
  </url>
</urlset>*/

	
//$link = mysqli_connect('localhost', 'root', 'pocoyojony12', 'customcoding');
$link = mysqli_connect('jonyjg.com', 'customco_sitio', '?#n&Hn?u5ppT', 'customco_sitio');

$site_xml = "";
$site_xml .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$site_xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
                xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
                xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 
                http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\"
                xmlns:xhtml=\"http://www.w3.org/1999/xhtml\">\n";

$site_xml .= "\n";

$site_xml .= "\t<url>\n";
$site_xml .= "\t\t<loc>https://jonyjg.com</loc>\n";
$site_xml .= "\t\t<xhtml:link rel=\"alternate\" hreflang=\"es-mx\" href=\"https://jonyjg.com\" />\n";
$site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
$site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
$site_xml .= "\t\t<priority>1.00</priority>\n";
$site_xml .= "\t</url>\n";

$site_xml .= "\t<url>\n";
$site_xml .= "\t\t<loc>https://jonyjg.com/resume</loc>\n";
$site_xml .= "\t\t<xhtml:link rel=\"alternate\" hreflang=\"es-mx\" href=\"https://jonyjg.com/resume\" />\n";
$site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
$site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
$site_xml .= "\t\t<priority>0.6</priority>\n";
$site_xml .= "\t</url>\n";

$site_xml .= "\t<url>\n";
$site_xml .= "\t\t<loc>https://jonyjg.com/portfolio</loc>\n";
$site_xml .= "\t\t<xhtml:link rel=\"alternate\" hreflang=\"es-mx\" href=\"https://jonyjg.com/portfolio\" />\n";
$site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
$site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
$site_xml .= "\t\t<priority>0.6</priority>\n";
$site_xml .= "\t</url>\n";

$site_xml .= "\t<url>\n";
$site_xml .= "\t\t<loc>https://jonyjg.com/contact</loc>\n";
$site_xml .= "\t\t<xhtml:link rel=\"alternate\" hreflang=\"es-mx\" href=\"https://jonyjg.com/contact\" />\n";
$site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
$site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
$site_xml .= "\t\t<priority>0.6</priority>\n";
$site_xml .= "\t</url>\n";


$sqlPortafolio = "SELECT * FROM proyecto";
$resPortafolio = mysqli_query( $link, $sqlPortafolio);
while ($row1 = mysqli_fetch_array($resPortafolio)) {
    $site_xml .= "\t<url>\n";
    $site_xml .= "\t\t<loc>https://jonyjg.com/portafolio/" . $row1["proyUrl"] . ".html</loc>\n";
    $site_xml .= "\t\t<xhtml:link rel=\"alternate\" hreflang=\"es-mx\" href=\"https://jonyjg.com/portafolio/" . $row1["proyUrl"] . ".html\" />\n";
    $site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
    $site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
    $site_xml .= "\t\t<priority>0.6</priority>\n";
    $site_xml .= "\t</url>\n";
}


$site_xml .= "\t<url>\n";
$site_xml .= "\t\t<loc>https://jonyjg.com/aviso-de-privacidad</loc>\n";
$site_xml .= "\t\t<xhtml:link rel=\"alternate\" hreflang=\"es-mx\" href=\"https://jonyjg.com/aviso-de-privacidad\" />\n";
$site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
$site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
$site_xml .= "\t\t<priority>0.6</priority>\n";
$site_xml .= "\t</url>\n";


$site_xml .= "\n";

$site_xml .= "</urlset>";

mysqli_close($link);

$nombre = "sitemap.xml";
$archivo= fopen($nombre, "w+");
fwrite($archivo, $site_xml);
fclose($archivo);

//bitacora en el cron
$arch = fopen(realpath( '.' )."/cron.log", "a+"); 
fwrite($arch, "[".date("Y-m-d H:i:s")."][success - Creación de sitemap.xml]\n");
fclose($arch);


?>