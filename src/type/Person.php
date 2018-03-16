<?php
/**
 * Created by PhpStorm.
 * User: edwin
 * Date: 16-03-18
 * Time: 13:25
 */

namespace edwrodrig\contento\type;

/**
 * Class Person
 * @package edwrodrig\contento\type
 * @contento_label_es Persona
 * @contento_label_en Person
 */
class Person
{

    /**
     * @var string
     * @contento_displayable true
     * @contento_label_es nombres
     * @contento_label_en name
     */
    private $name;

    /**
     * @var string
     * @contento_displayable true
     * @contento_label_es apellido paterno
     * @contento_label_en lastname
     */
    private $surname;

    /**
     * @var string|null
     * @contento_label_es apellido materno
     * @contento_label_en lastname 2
     */
    private $surname_2;

    /**
     * @var Date|null
     * @contento_label_es fecha de nacimiento
     * @contento_label_en birthday
     */
    private $birthday;

    /**
     * @var Gender|null
     */
    private $gender;

    /**
     * @var Country
     * @contento_label_es nacionalidad
     * @contento_label_en nationality
     */
    private $nationality;

    /**
     * @var Email|null
     * @contento_label_es correo personal
     * @contento_label_en personal mail
     */
    private $personal_mail;


    public function from_array(array $data) {
        $this->name = $data['name'];
        $this->surname = $data['surname'];
        $this->surname_2 = $data['surname_2'] ?? null;
        $this->birthday = new Date($data['birthday']);
        $this->gender = new Gender($data['gender']);
        $this->nationality = new Country($data['nationality']);
        $this->personal_mail = new Email($data['personal_mail']);
    }

    public function to_array() : array {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'surname_2' => $this->surname_2,
            'gender'=> strval($this->gender),
            'nationality' => strval($this->nationality),
            'personal_mail' => strval($this->personal_mail)
        ];
    }

/**
"fields": [
{"field": "display_name", "type": "string", "label": { "es" : "nombre visible", "en": "display name"}, "desc" : { "es": "Nombre que se mostrará en pantalla. Útil cuando no se quiere usar el nombre por defecto deducido por el sistema. Ejemplo: En las páginas web, usar el segundo nombre en vez del primero, usar ambos nombres en vez de uno." }},
    {"field": "address", "type": "custom", "type_name": "common_address"},
    {"field": "gender", "type": "custom", "type_name" : "common_gender"},
    {"field": "bio", "type": "string", "style": "rich", "tr": true, "label": { "es": "biografía", "en": "biography" }},
    {"field": "mail", "type": "string", "label" : { "es" : "correo", "en" : "mail"}},
    {"field": "phones", "type": "list", "elem" : { "type": "string"}, "label": { "es" : "teléfonos", "en": "phones"}},
    {"field": "image", "type": "string", "label": { "es" : "imagen", "en": "image"}},
    {"field": "sort_key", "type": "string", "label" : { "es" : "prefijo de ordenamiento", "en" : "order preffix"}},
    {"field": "other_data", "type": "string", "style": "area", "label": {"es" : "otros datos", "en": "other data" }}
  ]
   */
}