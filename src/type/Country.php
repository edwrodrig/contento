<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 14:07
 */

namespace edwrodrig\contento\type;
use JsonSerializable;

/**
 * Class Country
 * @package edwrodrig\contento\type
 * @contento_label_es país
 * @contento_label_en country
 */
class Country implements JsonSerializable
{
    /**
     * @var string
     */
    private $country;

    public function __construct(string $country)
    {
        $this->country = $country;
    }

    public function __toString(): string
    {
        return $this->country;
    }

    public function jsonSerialize() {
        return $this->country;
    }
}

/**
 * [
{
"value" : "",
"label" : {
"es" : "Seleccione un país",
"en" : "Choose a country"
}
},
{
"value": "afghanistan",
"label": {
"en": "Afghanistan",
"es": "Afganistán"
}
},
{
"value": "akrotiri",
"label": {
"en": "Akrotiri",
"es": "Acrotiri"
}
},
{
"value": "albania",
"label": {
"en": "Albania",
"es": "Albania"
}
},
{
"value": "algeria",
"label": {
"en": "Algeria",
"es": "Argelia"
}
},
{
"value": "american samoa",
"label": {
"en": "American Samoa",
"es": "Samoa Americana"
}
},
{
"value": "andorra",
"label": {
"en": "Andorra",
"es": "Andorra"
}
},
{
"value": "angola",
"label": {
"en": "Angola",
"es": "Angola"
}
},
{
"value": "anguilla",
"label": {
"en": "Anguilla",
"es": "Anguila"
}
},
{
"value": "antarctica",
"label": {
"en": "Antarctica",
"es": "Antártida"
}
},
{
"value": "antigua and barbuda",
"label": {
"en": "Antigua and Barbuda",
"es": "Antigua y Barbuda"
}
},
{
"value": "argentina",
"label": {
"en": "Argentina",
"es": "Argentina"
}
},
{
"value": "armenia",
"label": {
"en": "Armenia",
"es": "Armenia"
}
},
{
"value": "aruba",
"label": {
"en": "Aruba",
"es": "Aruba"
}
},
{
"value": "ashmore and cartier islands",
"label": {
"en": "Ashmore and Cartier Islands",
"es": "Islas Ashmore y Cartier"
}
},
{
"value": "australia",
"label": {
"en": "Australia",
"es": "Australia"
}
},
{
"value": "austria",
"label": {
"en": "Austria",
"es": "Austria"
}
},
{
"value": "azerbaijan",
"label": {
"en": "Azerbaijan",
"es": "Azerbaiyán"
}
},
{
"value": "bahamas, the",
"label": {
"en": "Bahamas, The",
"es": "Las Bahamas"
}
},
{
"value": "bahrain",
"label": {
"en": "Bahrain",
"es": "Baréin"
}
},
{
"value": "bangladesh",
"label": {
"en": "Bangladesh",
"es": "Bangladés"
}
},
{
"value": "barbados",
"label": {
"en": "Barbados",
"es": "Barbados"
}
},
{
"value": "bassas da india",
"label": {
"en": "Bassas da India",
"es": "Bassas da India"
}
},
{
"value": "belarus",
"label": {
"en": "Belarus",
"es": "Bielorrusia"
}
},
{
"value": "belgium",
"label": {
"en": "Belgium",
"es": "Bélgica"
}
},
{
"value": "belize",
"label": {
"en": "Belize",
"es": "Belice"
}
},
{
"value": "benin",
"label": {
"en": "Benin",
"es": "Benín"
}
},
{
"value": "bermuda",
"label": {
"en": "Bermuda",
"es": "Las islas Bermudas"
}
},
{
"value": "bhutan",
"label": {
"en": "Bhutan",
"es": "Bután"
}
},
{
"value": "bolivia",
"label": {
"en": "Bolivia",
"es": "Bolivia"
}
},
{
"value": "bosnia and herzegovina",
"label": {
"en": "Bosnia and Herzegovina",
"es": "Bosnia y Herzegovina"
}
},
{
"value": "botswana",
"label": {
"en": "Botswana",
"es": "Botsuana"
}
},
{
"value": "bouvet island",
"label": {
"en": "Bouvet Island",
"es": "La isla Bouvet"
}
},
{
"value": "brazil",
"label": {
"en": "Brazil",
"es": "Brasil"
}
},
{
"value": "british indian ocean territory",
"label": {
"en": "British Indian Ocean Territory",
"es": "Territorio británico del océano Índico"
}
},
{
"value": "british virgin islands",
"label": {
"en": "British Virgin Islands",
"es": "Islas Vírgenes Británicas"
}
},
{
"value": "brunei",
"label": {
"en": "Brunei",
"es": "Brunéi"
}
},
{
"value": "bulgaria",
"label": {
"en": "Bulgaria",
"es": "Bulgaria"
}
},
{
"value": "burkina faso",
"label": {
"en": "Burkina Faso",
"es": "Burkina Faso"
}
},
{
"value": "burma",
"label": {
"en": "Burma",
"es": "Birmania"
}
},
{
"value": "burundi",
"label": {
"en": "Burundi",
"es": "Burundi"
}
},
{
"value": "cambodia",
"label": {
"en": "Cambodia",
"es": "Camboya"
}
},
{
"value": "cameroon",
"label": {
"en": "Cameroon",
"es": "Camerún"
}
},
{
"value": "canada",
"label": {
"en": "Canada",
"es": "Canadá"
}
},
{
"value": "cape verde",
"label": {
"en": "Cape Verde",
"es": "Cabo Verde"
}
},
{
"value": "cayman islands",
"label": {
"en": "Cayman Islands",
"es": "Islas Caimán"
}
},
{
"value": "central african republic",
"label": {
"en": "Central African Republic",
"es": "República Centroafricana"
}
},
{
"value": "chad",
"label": {
"en": "Chad",
"es": "Chad"
}
},
{
"value": "chile",
"label": {
"en": "Chile",
"es": "Chile"
}
},
{
"value": "china",
"label": {
"en": "China",
"es": "China"
}
},
{
"value": "christmas island",
"label": {
"en": "Christmas Island",
"es": "Isla Navidad"
}
},
{
"value": "clipperton island",
"label": {
"en": "Clipperton Island",
"es": "Isla Clipperton o Isla de la Pasión"
}
},
{
"value": "islands",
"label": {
"en": "Islands",
"es": "Islas Cocos o Islas Keeling"
}
},
{
"value": "colombia",
"label": {
"en": "Colombia",
"es": "Colombia"
}
},
{
"value": "comoros",
"label": {
"en": "Comoros",
"es": "Comoras"
}
},
{
"value": "congo, democratic republic of the",
"label": {
"en": "Congo, Democratic Republic of the",
"es": "República Democrática del Congo"
}
},
{
"value": "congo, republic of the",
"label": {
"en": "Congo, Republic of the",
"es": "República del Congo"
}
},
{
"value": "cook islands",
"label": {
"en": "Cook Islands",
"es": "Islas Cook"
}
},
{
"value": "coral sea islands",
"label": {
"en": "Coral Sea Islands",
"es": "Islas del Mar del Coral"
}
},
{
"value": "costa rica",
"label": {
"en": "Costa Rica",
"es": "Costa Rica"
}
},
{
"value": "cote d'ivoire",
"label": {
"en": "Cote d'Ivoire",
"es": "Costa de Marfil"
}
},
{
"value": "croatia",
"label": {
"en": "Croatia",
"es": "Croacia"
}
},
{
"value": "cuba",
"label": {
"en": "Cuba",
"es": "Cuba"
}
},
{
"value": "cyprus",
"label": {
"en": "Cyprus",
"es": "Chipre"
}
},
{
"value": "czech republic",
"label": {
"en": "Czech Republic",
"es": "República Checa"
}
},
{
"value": "denmark",
"label": {
"en": "Denmark",
"es": "Dinamarca"
}
},
{
"value": "dhekelia",
"label": {
"en": "Dhekelia",
"es": "Dhekelia"
}
},
{
"value": "djibouti",
"label": {
"en": "Djibouti",
"es": "Yibuti"
}
},
{
"value": "dominica",
"label": {
"en": "Dominica",
"es": "Dominica"
}
},
{
"value": "dominican republic",
"label": {
"en": "Dominican Republic",
"es": "República Dominicana"
}
},
{
"value": "ecuador",
"label": {
"en": "Ecuador",
"es": "Ecuador"
}
},
{
"value": "egypt",
"label": {
"en": "Egypt",
"es": "Egipto"
}
},
{
"value": "el salvador",
"label": {
"en": "El Salvador",
"es": "El Salvador"
}
},
{
"value": "equatorial guinea",
"label": {
"en": "Equatorial Guinea",
"es": "Guinea Ecuatorial"
}
},
{
"value": "eritrea",
"label": {
"en": "Eritrea",
"es": "Eritrea"
}
},
{
"value": "estonia",
"label": {
"en": "Estonia",
"es": "Estonia"
}
},
{
"value": "ethiopia",
"label": {
"en": "Ethiopia",
"es": "Etiopía"
}
},
{
"value": "europa island",
"label": {
"en": "Europa Island",
"es": "Isla Europa"
}
},
{
"value": "faroe islands",
"label": {
"en": "Faroe Islands",
"es": "Islas Feroe"
}
},
{
"value": "fiji",
"label": {
"en": "Fiji",
"es": "Fiyi"
}
},
{
"value": "finland",
"label": {
"en": "Finland",
"es": "Finlandia"
}
},
{
"value": "france",
"label": {
"en": "France",
"es": "Francia"
}
},
{
"value": "french guiana",
"label": {
"en": "French Guiana",
"es": "Guinea Francesa"
}
},
{
"value": "french polynesia",
"label": {
"en": "French Polynesia",
"es": "Polinesia Francesa"
}
},
{
"value": "french southern and antarctic lands",
"label": {
"en": "French Southern and Antarctic Lands",
"es": "Tierras Australes y Antárticas Francesas"
}
},
{
"value": "gabon",
"label": {
"en": "Gabon",
"es": "Gabón"
}
},
{
"value": "gambia, the",
"label": {
"en": "Gambia, The",
"es": "Gambia"
}
},
{
"value": "gaza strip",
"label": {
"en": "Gaza Strip",
"es": "Franja de Gaza"
}
},
{
"value": "georgia",
"label": {
"en": "Georgia",
"es": "Georgia"
}
},
{
"value": "germany",
"label": {
"en": "Germany",
"es": "Alemania"
}
},
{
"value": "ghana",
"label": {
"en": "Ghana",
"es": "Ghana"
}
},
{
"value": "gibraltar",
"label": {
"en": "Gibraltar",
"es": "Gibraltar"
}
},
{
"value": "glorioso islands",
"label": {
"en": "Glorioso Islands",
"es": "Islas Gloriosas o Glorioso"
}
},
{
"value": "greece",
"label": {
"en": "Greece",
"es": "Grecia"
}
},
{
"value": "greenland",
"label": {
"en": "Greenland",
"es": "Groenlandia"
}
},
{
"value": "grenada",
"label": {
"en": "Grenada",
"es": "Granada"
}
},
{
"value": "guadeloupe",
"label": {
"en": "Guadeloupe",
"es": "Guadalupe"
}
},
{
"value": "guam",
"label": {
"en": "Guam",
"es": "Guam"
}
},
{
"value": "guatemala",
"label": {
"en": "Guatemala",
"es": "Guatemala"
}
},
{
"value": "guernsey",
"label": {
"en": "Guernsey",
"es": "Bailiazgo de Guernsey"
}
},
{
"value": "guinea",
"label": {
"en": "Guinea",
"es": "Guinea"
}
},
{
"value": "guinea-bissau",
"label": {
"en": "Guinea-Bissau",
"es": "Guinea-Bisáu"
}
},
{
"value": "guyana",
"label": {
"en": "Guyana",
"es": "Guyana"
}
},
{
"value": "haiti",
"label": {
"en": "Haiti",
"es": "Haití"
}
},
{
"value": "heard island and mcdonald islands",
"label": {
"en": "Heard Island and McDonald Islands",
"es": "Islas Heard y McDonald"
}
},
{
"value": "holy see (vatican city)",
"label": {
"en": "Holy See (Vatican City)",
"es": "Santa Sede (Ciudad del Vaticano)"
}
},
{
"value": "honduras",
"label": {
"en": "Honduras",
"es": "Honduras"
}
},
{
"value": "hong kong",
"label": {
"en": "Hong Kong",
"es": "Hong Kong"
}
},
{
"value": "hungary",
"label": {
"en": "Hungary",
"es": "Hungría"
}
},
{
"value": "iceland",
"label": {
"en": "Iceland",
"es": "Islandia"
}
},
{
"value": "india",
"label": {
"en": "India",
"es": "India"
}
},
{
"value": "indonesia",
"label": {
"en": "Indonesia",
"es": "Indonesia"
}
},
{
"value": "iran",
"label": {
"en": "Iran",
"es": "Irán"
}
},
{
"value": "iraq",
"label": {
"en": "Iraq",
"es": "Irak"
}
},
{
"value": "ireland",
"label": {
"en": "Ireland",
"es": "Irlanda"
}
},
{
"value": "isle of man",
"label": {
"en": "Isle of Man",
"es": "Isla de Man"
}
},
{
"value": "israel",
"label": {
"en": "Israel",
"es": "Israel"
}
},
{
"value": "italy",
"label": {
"en": "Italy",
"es": "Italia"
}
},
{
"value": "jamaica",
"label": {
"en": "Jamaica",
"es": "Jamaica"
}
},
{
"value": "jan mayen",
"label": {
"en": "Jan Mayen",
"es": "Jan Mayen"
}
},
{
"value": "japan",
"label": {
"en": "Japan",
"es": "Japón"
}
},
{
"value": "jersey",
"label": {
"en": "Jersey",
"es": "Bailiazgo de Jersey"
}
},
{
"value": "jordan",
"label": {
"en": "Jordan",
"es": "Jordania"
}
},
{
"value": "juan de nova island",
"label": {
"en": "Juan de Nova Island",
"es": "Isla Juan de Nova"
}
},
{
"value": "kazakhstan",
"label": {
"en": "Kazakhstan",
"es": "Kazajistán"
}
},
{
"value": "kenya",
"label": {
"en": "Kenya",
"es": "Kenia"
}
},
{
"value": "kiribati",
"label": {
"en": "Kiribati",
"es": "Kiribati"
}
},
{
"value": "korea, north",
"label": {
"en": "Korea, North",
"es": "Corea del Norte"
}
},
{
"value": "korea, south",
"label": {
"en": "Korea, South",
"es": "Corea del Sur"
}
},
{
"value": "kuwait",
"label": {
"en": "Kuwait",
"es": "Kuwait"
}
},
{
"value": "kyrgyzstan",
"label": {
"en": "Kyrgyzstan",
"es": "Kirguistán"
}
},
{
"value": "laos",
"label": {
"en": "Laos",
"es": "Laos"
}
},
{
"value": "latvia",
"label": {
"en": "Latvia",
"es": "Letonia"
}
},
{
"value": "lebanon",
"label": {
"en": "Lebanon",
"es": "Líbano"
}
},
{
"value": "lesotho",
"label": {
"en": "Lesotho",
"es": "Lesoto"
}
},
{
"value": "liberia",
"label": {
"en": "Liberia",
"es": "Liberia"
}
},
{
"value": "libya",
"label": {
"en": "Libya",
"es": "Libia"
}
},
{
"value": "liechtenstein",
"label": {
"en": "Liechtenstein",
"es": "Liechtenstein"
}
},
{
"value": "lithuania",
"label": {
"en": "Lithuania",
"es": "Lituania"
}
},
{
"value": "luxembourg",
"label": {
"en": "Luxembourg",
"es": "Luxemburgo"
}
},
{
"value": "macau",
"label": {
"en": "Macau",
"es": "Macao"
}
},
{
"value": "macedonia",
"label": {
"en": "Macedonia",
"es": "Macedonia"
}
},
{
"value": "madagascar",
"label": {
"en": "Madagascar",
"es": "Madagascar"
}
},
{
"value": "malawi",
"label": {
"en": "Malawi",
"es": "Malaui o Malawi"
}
},
{
"value": "malaysia",
"label": {
"en": "Malaysia",
"es": "Malasia"
}
},
{
"value": "maldives",
"label": {
"en": "Maldives",
"es": "Maldivas"
}
},
{
"value": "mali",
"label": {
"en": "Mali",
"es": "Malí o Mali"
}
},
{
"value": "malta",
"label": {
"en": "Malta",
"es": "Malta"
}
},
{
"value": "marshall islands",
"label": {
"en": "Marshall Islands",
"es": "Islas Marshall"
}
},
{
"value": "martinique",
"label": {
"en": "Martinique",
"es": "Martinica"
}
},
{
"value": "mauritania",
"label": {
"en": "Mauritania",
"es": "Mauritania"
}
},
{
"value": "mauritius",
"label": {
"en": "Mauritius",
"es": "Mauricio"
}
},
{
"value": "mayotte",
"label": {
"en": "Mayotte",
"es": "Mayotte"
}
},
{
"value": "mexico",
"label": {
"en": "Mexico",
"es": "México"
}
},
{
"value": "micronesia, federated states of",
"label": {
"en": "Micronesia, Federated States of",
"es": "Estados Federados de Micronesia"
}
},
{
"value": "moldova",
"label": {
"en": "Moldova",
"es": "Moldavia"
}
},
{
"value": "monaco",
"label": {
"en": "Monaco",
"es": "Mónaco"
}
},
{
"value": "mongolia",
"label": {
"en": "Mongolia",
"es": "Mongolia"
}
},
{
"value": "montserrat",
"label": {
"en": "Montserrat",
"es": "Isla de Montserrat"
}
},
{
"value": "morocco",
"label": {
"en": "Morocco",
"es": "Marruecos"
}
},
{
"value": "mozambique",
"label": {
"en": "Mozambique",
"es": "Mozambique"
}
},
{
"value": "namibia",
"label": {
"en": "Namibia",
"es": "Namibia"
}
},
{
"value": "nauru",
"label": {
"en": "Nauru",
"es": "República de Nauru"
}
},
{
"value": "navassa island",
"label": {
"en": "Navassa Island",
"es": "Isla de Navaza"
}
},
{
"value": "nepal",
"label": {
"en": "Nepal",
"es": "Nepal"
}
},
{
"value": "netherlands (holland)",
"label": {
"en": "Netherlands (Holland)",
"es": "Países Bajos (Holanda)"
}
},
{
"value": "netherlands antilles",
"label": {
"en": "Netherlands Antilles",
"es": "Antillas Neerlandesas"
}
},
{
"value": "new caledonia",
"label": {
"en": "New Caledonia",
"es": "Nueva Caledonia"
}
},
{
"value": "new zealand",
"label": {
"en": "New Zealand",
"es": "Nueva Zelanda"
}
},
{
"value": "nicaragua",
"label": {
"en": "Nicaragua",
"es": "Nicaragua"
}
},
{
"value": "niger",
"label": {
"en": "Niger",
"es": "Níger"
}
},
{
"value": "nigeria",
"label": {
"en": "Nigeria",
"es": "Nigeria"
}
},
{
"value": "niue",
"label": {
"en": "Niue",
"es": "Niue"
}
},
{
"value": "norfolk island",
"label": {
"en": "Norfolk Island",
"es": "Isla Norfolk"
}
},
{
"value": "northern mariana islands",
"label": {
"en": "Northern Mariana Islands",
"es": "Islas Marianas del Norte"
}
},
{
"value": "norway",
"label": {
"en": "Norway",
"es": "Noruega"
}
},
{
"value": "oman",
"label": {
"en": "Oman",
"es": "Omán"
}
},
{
"value": "pakistan",
"label": {
"en": "Pakistan",
"es": "Pakistán o Paquistán"
}
},
{
"value": "palau",
"label": {
"en": "Palau",
"es": "Palau"
}
},
{
"value": "panama",
"label": {
"en": "Panama",
"es": "Panamá"
}
},
{
"value": "papua new guinea",
"label": {
"en": "Papua New Guinea",
"es": "Papúa Nueva Guinea"
}
},
{
"value": "paracel islands",
"label": {
"en": "Paracel Islands",
"es": "Islas Paracelso"
}
},
{
"value": "paraguay",
"label": {
"en": "Paraguay",
"es": "Paraguay"
}
},
{
"value": "peru",
"label": {
"en": "Peru",
"es": "Perú"
}
},
{
"value": "philippines",
"label": {
"en": "Philippines",
"es": "Filipinas"
}
},
{
"value": "pitcairn islands",
"label": {
"en": "Pitcairn Islands",
"es": "Islas Pitcairn"
}
},
{
"value": "poland",
"label": {
"en": "Poland",
"es": "Polonia"
}
},
{
"value": "portugal",
"label": {
"en": "Portugal",
"es": "Portugal"
}
},
{
"value": "puerto rico",
"label": {
"en": "Puerto Rico",
"es": "Puerto Rico"
}
},
{
"value": "qatar",
"label": {
"en": "Qatar",
"es": "Catar"
}
},
{
"value": "reunion",
"label": {
"en": "Reunion",
"es": "Isla de la Reunión"
}
},
{
"value": "romania",
"label": {
"en": "Romania",
"es": "Rumania o Rumanía"
}
},
{
"value": "russia",
"label": {
"en": "Russia",
"es": "Rusia"
}
},
{
"value": "rwanda",
"label": {
"en": "Rwanda",
"es": "Ruanda"
}
},
{
"value": "saint helena",
"label": {
"en": "Saint Helena",
"es": "Santa Elena, Ascensión y Tristán de Acuña"
}
},
{
"value": "saint kitts and nevis",
"label": {
"en": "Saint Kitts and Nevis",
"es": "San Cristóbal y Nieves"
}
},
{
"value": "saint lucia",
"label": {
"en": "Saint Lucia",
"es": "Santa Lucía"
}
},
{
"value": "saint pierre and miquelon",
"label": {
"en": "Saint Pierre and Miquelon",
"es": "San Pedro y Miquelón"
}
},
{
"value": "saint vincent and the grenadines",
"label": {
"en": "Saint Vincent and the Grenadines",
"es": "San Vicente y las Granadinas"
}
},
{
"value": "samoa",
"label": {
"en": "Samoa",
"es": "Samoa"
}
},
{
"value": "san marino",
"label": {
"en": "San Marino",
"es": "San Marino"
}
},
{
"value": "sao tome and principe",
"label": {
"en": "Sao Tome and Principe",
"es": "Santo Tomé y Príncipe"
}
},
{
"value": "saudi arabia",
"label": {
"en": "Saudi Arabia",
"es": "Arabia Saudita o Arabia Saudí"
}
},
{
"value": "senegal",
"label": {
"en": "Senegal",
"es": "Senegal"
}
},
{
"value": "serbia and montenegro",
"label": {
"en": "Serbia and Montenegro",
"es": "Serbia y Montenegro"
}
},
{
"value": "seychelles",
"label": {
"en": "Seychelles",
"es": "Seychelles"
}
},
{
"value": "sierra leone",
"label": {
"en": "Sierra Leone",
"es": "Sierra Leona"
}
},
{
"value": "singapore",
"label": {
"en": "Singapore",
"es": "Singapur"
}
},
{
"value": "slovakia",
"label": {
"en": "Slovakia",
"es": "Eslovaquia"
}
},
{
"value": "slovenia",
"label": {
"en": "Slovenia",
"es": "Eslovenia"
}
},
{
"value": "solomon islands",
"label": {
"en": "Solomon Islands",
"es": "Islas Salomón"
}
},
{
"value": "somalia",
"label": {
"en": "Somalia",
"es": "Somalia"
}
},
{
"value": "south africa",
"label": {
"en": "South Africa",
"es": "Sudáfrica"
}
},
{
"value": "south georgia and the south sandwich islands",
"label": {
"en": "South Georgia and the South Sandwich Islands",
"es": "Islas Georgias del Sur y Sandwich del Sur"
}
},
{
"value": "spain",
"label": {
"en": "Spain",
"es": "España"
}
},
{
"value": "spratly islands",
"label": {
"en": "Spratly Islands",
"es": "Islas Spratly"
}
},
{
"value": "sri lanka",
"label": {
"en": "Sri Lanka",
"es": "Sri Lanka"
}
},
{
"value": "sudan",
"label": {
"en": "Sudan",
"es": "Sudán"
}
},
{
"value": "suriname",
"label": {
"en": "Suriname",
"es": "Surinam"
}
},
{
"value": "svalbard",
"label": {
"en": "Svalbard",
"es": "El archipiélago Svalbard"
}
},
{
"value": "swaziland",
"label": {
"en": "Swaziland",
"es": "Suazilandia"
}
},
{
"value": "sweden",
"label": {
"en": "Sweden",
"es": "Suecia"
}
},
{
"value": "switzerland",
"label": {
"en": "Switzerland",
"es": "Suiza"
}
},
{
"value": "syria",
"label": {
"en": "Syria",
"es": "Siria"
}
},
{
"value": "taiwan",
"label": {
"en": "Taiwan",
"es": "Taiwán"
}
},
{
"value": "tajikistan",
"label": {
"en": "Tajikistan",
"es": "Tayikistán"
}
},
{
"value": "tanzania",
"label": {
"en": "Tanzania",
"es": "Tanzania"
}
},
{
"value": "thailand",
"label": {
"en": "Thailand",
"es": "Tailandia"
}
},
{
"value": "timor-leste",
"label": {
"en": "Timor-Leste",
"es": "Timor Oriental"
}
},
{
"value": "togo",
"label": {
"en": "Togo",
"es": "Togo"
}
},
{
"value": "tokelau",
"label": {
"en": "Tokelau",
"es": "Tokelau"
}
},
{
"value": "tonga",
"label": {
"en": "Tonga",
"es": "Tonga"
}
},
{
"value": "trinidad and tobago",
"label": {
"en": "Trinidad and Tobago",
"es": "Trinidad y Tobago"
}
},
{
"value": "tromelin island",
"label": {
"en": "Tromelin Island",
"es": "Isla Tromelin"
}
},
{
"value": "tunisia",
"label": {
"en": "Tunisia",
"es": "Túnez"
}
},
{
"value": "turkey",
"label": {
"en": "Turkey",
"es": "Turquía"
}
},
{
"value": "turkmenistan",
"label": {
"en": "Turkmenistan",
"es": "Turkmenistán"
}
},
{
"value": "turks and caicos islands",
"label": {
"en": "Turks and Caicos Islands",
"es": "Islas Turcas y Caicos"
}
},
{
"value": "tuvalu",
"label": {
"en": "Tuvalu",
"es": "Tuvalu"
}
},
{
"value": "uganda",
"label": {
"en": "Uganda",
"es": "Uganda"
}
},
{
"value": "ukraine",
"label": {
"en": "Ukraine",
"es": "Ucrania"
}
},
{
"value": "united arab emirates",
"label": {
"en": "United Arab Emirates",
"es": "Emiratos Árabes Unidos"
}
},
{
"value": "united kingdom",
"label": {
"en": "United Kingdom",
"es": "Reino Unido"
}
},
{
"value": "united states",
"label": {
"en": "United States",
"es": "Estados Unidos"
}
},
{
"value": "uruguay",
"label": {
"en": "Uruguay",
"es": "Uruguay"
}
},
{
"value": "uzbekistan",
"label": {
"en": "Uzbekistan",
"es": "Uzbekistán"
}
},
{
"value": "vanuatu",
"label": {
"en": "Vanuatu",
"es": "Vanuatu"
}
},
{
"value": "venezuela",
"label": {
"en": "Venezuela",
"es": "Venezuela"
}
},
{
"value": "vietnam",
"label": {
"en": "Vietnam",
"es": "Vietnam"
}
},
{
"value": "virgin islands",
"label": {
"en": "Virgin Islands",
"es": "Islas Vírgenes"
}
},
{
"value": "wake island",
"label": {
"en": "Wake Island",
"es": "Isla Wake"
}
},
{
"value": "wallis and futuna",
"label": {
"en": "Wallis and Futuna",
"es": "La Colectividad de Wallis y Futuna"
}
},
{
"value": "west bank",
"label": {
"en": "West Bank",
"es": "Cisjordania"
}
},
{
"value": "western sahara",
"label": {
"en": "Western Sahara",
"es": "Sahara Occidental"
}
},
{
"value": "yemen",
"label": {
"en": "Yemen",
"es": "Yemen"
}
},
{
"value": "zambia",
"label": {
"en": "Zambia",
"es": "Zambia"
}
},
{
"value": "zimbabwe",
"label": {
"en": "Zimbabwe",
"es": "Zimbabue"
}
}
]

 */
