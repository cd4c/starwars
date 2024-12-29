<?php
// si buscas anakin skywalker te sale darth vader, le habrán arruinado la infancia a más de un crio
function getImageEntity($entityName)
{
    // he tenido que cambiar los espacios por barra baja para que haga bien la url para el curl
    $url = "https://en.wikipedia.org/wiki/" . urlencode(str_replace(' ', '_', $entityName));

    // iniciamos el curl sobre la url
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // redirecciones
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $html = curl_exec($ch);
    curl_close($ch);

    if (empty($html)) {
        return null;
    }
    // cargo el documento en forma de html, sino carga nada devuelve null para evitar problemas como con unknown
    $dom = new DOMDocument();
    if (@$dom->loadHTML($html) === false) {
        return null;
    }

    // busco mediante una query la ruta de la imagen  
    $finder = new DOMXPath($dom);
    $imageNode = $finder->query("//table[contains(@class, 'infobox')]//img");

    if ($imageNode->length > 0) {
        $src = $imageNode[0]->getAttribute('src');
        return "https:" . $src;
    }

    return null;
}
