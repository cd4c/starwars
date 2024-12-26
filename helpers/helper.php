<?php
$baseUrl = 'https://swapi.py4e.com/api/'; // original = https://swapi.dev/api/

function apiCall($url)
{
    $response = @file_get_contents($url);
    return json_decode(
        $response,
        true
    );
}

function traducirDelWoke($tipoRecurso, $datos)
{
    $mapaClaves = mapeoWoke($tipoRecurso);
    $datosTraducidos = [];

    foreach ($datos as $clave => $valor) {
        $claveTraducida = $mapaClaves[$clave] ?? $clave;
        if (is_array($valor)) {
            $datosTraducidos[$claveTraducida] = traducirDelWoke($tipoRecurso, $valor);
        } else {
            $datosTraducidos[$claveTraducida] = $valor;
        }
    }

    return $datosTraducidos;
}

function mapeoWoke($tipoRecurso)
{
    $mapeo = [
        "people" => [
            "whrascwo" => "name",
            "acwoahrracao" => "height",
            "scracc" => "mass",
            "acraahrc_oaooanoorc" => "hair_color",
            "corahwh_oaooanoorc" => "skin_color",
            "worowo_oaooanoorc" => "eye_color",
            "rhahrcaoac_roworarc" => "birth_year",
            "rrwowhwaworc" => "gender",
            "acooscwoohoorcanwa" => "homeworld",
            "wwahanscc" => "films",
            "cakwooaahwoc" => "species",
            "howoacahoaanwoc" => "vehicles",
            "caorarccacahakc" => "starships",
            "oarcworaaowowa" => "created",
            "wowaahaowowa" => "edited",
            "hurcan" => "url"
        ],
        "planets" => [
            "whrascwo" => "name",
            "rcooaoraaoahoowh_akworcahoowa" => "rotation_period",
            "oorcrhahaoraan_akworcahoowa" => "orbital_period",
            "waahrascwoaoworc" => "diameter",
            "oaanahscraaowo" => "climate",
            "rrrcrahoahaoro" => "gravity",
            "aoworcrcraahwh" => "terrain",
            "churcwwraoawo_ohraaoworc" => "surface_water",
            "akooakhuanraaoahoowh" => "population",
            "rcwocahwawowhaoc" => "residents",
            "wwahanscc" => "films",
            "oarcworaaowowa" => "created",
            "wowaahaowowa" => "edited",
            "hurcan" => "url"
        ],
        "species" => [
            "whrascwo" => "name",
            "oaanraccahwwahoaraaoahoowh" => "classification",
            "wawocahrrwhraaoahoowh" => "designation",
            "rahoworcrarrwo_acwoahrracao" => "average_height",
            "corahwh_oaooanoorcc" => "skin_colors",
            "acraahrc_oaooanoorcc" => "hair_colors",
            "worowo_oaooanoorc" => "eye_colors",
            "rahoworcrarrwo_anahwwwocakrawh" => "average_lifespan",
            "acooscwoohoorcanwa" => "homeworld",
            "anrawhrrhurarrwo" => "language",
            "akwoooakanwo" => "people",
            "wwahanscc" => "films",
            "oarcworaaowowa" => "created",
            "wowaahaowowa" => "edited",
            "hurcan" => "url"
        ],
        "vehicles" => [
            "whrascwo" => "name",
            "scoowawoan" => "model",
            "scrawhhuwwraoaaohurcworc" => "manufacturer",
            "oaoocao_ahwh_oarcwowaahaoc" => "cost_in_credits",
            "anwowhrraoac" => "length",
            "scrak_raaoscoocakacworcahwhrr_cakwowowa" => "max_atmosphering_speed",
            "oarcwooh" => "crew",
            "akraccwowhrrworcc" => "passengers",
            "oararcrroo_oaraakraoaahaoro" => "cargo_capacity",
            "oaoowhchuscrarhanwoc" => "consumables",
            "howoacahoaanwo_oaanracc" => "vehicle_class",
            "akahanooaoc" => "pilots",
            "wwahanscc" => "films",
            "oarcworaaowowa" => "created",
            "wowaahaowowa" => "edited",
            "hurcan" => "url"
        ],
        "starships" => [
            "whrascwo" => "name",
            "scoowawoan" => "model",
            "scrawhhuwwraoaaohurcworc" => "manufacturer",
            "oaoocao_ahwh_oarcwowaahaoc" => "cost_in_credits",
            "anwowhrraoac" => "length",
            "scrak_raaoscoocakacworcahwhrr_cakwowowa" => "max_atmosphering_speed",
            "oarcwooh" => "crew",
            "akraccwowhrrworcc" => "passengers",
            "oararcrroo_oaraakraoaahaoro" => "cargo_capacity",
            "oaoowhchuscrarhanwoc" => "consumables",
            "acroakworcwarcahhowo_rcraaoahwhrr" => "hyperdrive_rating",
            "MGLT" => "MGLT",
            "caorarccacahak_oaanracc" => "starship_class",
            "akahanooaoc" => "pilots",
            "wwahanscc" => "films",
            "oarcworaaowowa" => "created",
            "wowaahaowowa" => "edited",
            "hurcan" => "url"
        ]
    ];

    return $mapeo[$tipoRecurso] ?? [];
}
