<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\CategoryModel;
use App\Models\ContactModel;
use App\Models\EducationModel;
use App\Models\ExperienceModel;
use App\Models\PortfolioGalleryModel;
use App\Models\PortfolioModel;
use App\Models\ServiceModel;
use App\Models\SkillModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

date_default_timezone_set("Mexico/General");
setlocale(LC_ALL, "es_MX");
//Indicamos que el contenido es XML
header("Content-Type: application/xml");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=xmlexport.xml");

//Formato valido por Google
/*
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
  <url>
    <loc>http://www.example.com/foo.html</loc>
    <lastmod>2018-12-24T00:27:56+00:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.00</priority>
  </url>
</urlset>
*/


class XMLController extends Controller {
    
    public function createXML() {
        
        $site_xml = "";
        $site_xml .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $site_xml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
                        xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
                        xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 
                        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";

        $site_xml .= "\n";

        $site_xml .= "\t<url>\n";
        $site_xml .= "\t\t<loc>https://jonyjg.com</loc>\n";
        $site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
        $site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
        $site_xml .= "\t\t<priority>1.00</priority>\n";
        $site_xml .= "\t</url>\n";

        $site_xml .= "\t<url>\n";
        $site_xml .= "\t\t<loc>https://jonyjg.com/resume</loc>\n";
        $site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
        $site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
        $site_xml .= "\t\t<priority>0.6</priority>\n";
        $site_xml .= "\t</url>\n";

        $site_xml .= "\t<url>\n";
        $site_xml .= "\t\t<loc>https://jonyjg.com/portfolio</loc>\n";
        $site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
        $site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
        $site_xml .= "\t\t<priority>0.6</priority>\n";
        $site_xml .= "\t</url>\n";

        //Proyects

        $proyects = PortfolioModel::portfolioAll();

        foreach($proyects as $proy) {
            $site_xml .= "\t<url>\n";
            $site_xml .= "\t\t<loc>https://jonyjg.com/portafolio/" . $proy->prt_slug . "</loc>\n";
            $site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
            $site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
            $site_xml .= "\t\t<priority>0.6</priority>\n";
            $site_xml .= "\t</url>\n";
        }


        $site_xml .= "\t<url>\n";
        $site_xml .= "\t\t<loc>https://jonyjg.com/contact</loc>\n";
        $site_xml .= "\t\t<lastmod>" . gmdate(DATE_W3C) . "</lastmod>\n";
        $site_xml .= "\t\t<changefreq>weekly</changefreq>\n";
        $site_xml .= "\t\t<priority>0.6</priority>\n";
        $site_xml .= "\t</url>\n";

        $site_xml .= "\n";

        $site_xml .= "</urlset>";

        $nombre = "sitemap.xml";

        $archivo= fopen($nombre, "w+");
        fwrite($archivo, $site_xml);
        fclose($archivo);


    }

}
