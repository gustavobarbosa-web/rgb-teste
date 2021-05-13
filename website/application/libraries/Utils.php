<?php defined('BASEPATH') or exit('No direct script access allowed');

class Utils
{
    public static function onlyNumbers($number)
    {
        return preg_replace('/[^0-9]/', '', $number);
    }

    public static function decimalFormat($number)
    {
        if (strpos($number, ".")) {
            $number = str_replace(".", ",", $number);
        }
        $number = explode(",", $number);

        $number = $number[0] . "." . $number[1];

        return floatval($number);
    }

    public static function checkCPF($cpf = null)
    {
        if (empty($cpf)) {
            return false;
        }
        $cpf = self::onlyNumbers($cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        if (
            strlen($cpf) != 11 ||
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
        ) {
            return false;
        }
        for ($verifier = 9; $verifier < 11; $verifier++) {
            for ($digit = 0, $position = 0; $position < $verifier; $position++) {
                $digit += $cpf{
                    $position} * (($verifier + 1) - $position);
            }
            $digit = ((10 * $digit) % 11) % 10;
            if ($cpf{
                $position} != $digit) {
                return false;
            }
        }
        return true;
    }

    public static function checkCNPJ($cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14) {
            return false;
        }
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{
            12} != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{
                $i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{
            13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    public static function validDoc($doc)
    {
        if (Utils::checkCNPJ($doc) || Utils::checkCPF($doc)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validDate($data)
    {
        $data = explode('-', $data);

        return $data[2] . '/' . $data[1] . '/' . $data[0];
    }

    public static function base62($data)
    {
        $outstring = '';
        $l = strlen($data);
        for ($i = 0; $i < $l; $i += 8) {
            $chunk = substr($data, $i, 8);
            $outlen = ceil((strlen($chunk) * 8) / 6); //8bit/char in, 6bits/char out, round up
            $x = bin2hex($chunk);  //gmp won't convert from binary, so go via hex
            $w = gmp_strval(gmp_init(ltrim($x, '0'), 16), 62); //gmp doesn't like leading 0s
            $pad = str_pad($w, $outlen, '0', STR_PAD_LEFT);
            $outstring .= $pad;
        }
        return substr($outstring, -1) . $outstring;
    }

    public static function unbase62($data)
    {
        $data = substr($data, 1);
        $outstring = '';
        $l = strlen($data);
        for ($i = 0; $i < $l; $i += 11) {
            $chunk = substr($data, $i, 11);
            $outlen = floor((strlen($chunk) * 6) / 8); //6bit/char in, 8bits/char out, round down
            $y = gmp_strval(gmp_init(ltrim($chunk, '0'), 62), 16); //gmp doesn't like leading 0s
            $pad = str_pad($y, $outlen * 2, '0', STR_PAD_LEFT); //double output length as as we're going via hex (4bits/char)
            $outstring .= pack('H*', $pad); //same as hex2bin
        }
        return $outstring;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public static function formatValue($valor)
    {
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        return $valor;
    }

    public static function validExtension($ext, $allowed)
    {
        $ext = strtolower($ext);
        if (in_array($ext, $allowed)) {
            return true;
        } else {
            return false;
        }
    }

    public static function randomString($limit = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = 'nsa';
        for ($i = 0; $i < $limit; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    public static function is_serialized($value, &$result = null)
    {
        // Bit of a give away this one
        if (!is_string($value)) {
            return false;
        }
        // Serialized false, return true. unserialize() returns false on an
        // invalid string or it could return false if the string is serialized
        // false, eliminate that possibility.
        if ($value === 'b:0;') {
            $result = false;
            return true;
        }
        $length    = strlen($value);
        $end    = '';
        switch ($value[0]) {
            case 's':
                if ($value[$length - 2] !== '"') {
                    return false;
                }
                // no break
            case 'b':
            case 'i':
            case 'd':
                // This looks odd but it is quicker than isset()ing
                $end .= ';';
                // no break
            case 'a':
            case 'O':
                $end .= '}';
                if ($value[1] !== ':') {
                    return false;
                }
                switch ($value[2]) {
                    case 0:
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                        break;
                    default:
                        return false;
                }
                // no break
            case 'N':
                $end .= ';';
                if ($value[$length - 1] !== $end[0]) {
                    return false;
                }
                break;
            default:
                return false;
        }
        if (($result = @unserialize($value)) === false) {
            $result = null;
            return false;
        }
        return true;
    }

    public static function serialize($array)
    {
        return base64_encode(serialize($array));
    }

    public static function unserialize($string)
    {
        return unserialize(base64_decode($string));
    }

    public static function in_md_array($needle, $haystack, $strict = false)
    {
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && Utils::in_md_array($needle, $item, $strict))) {
                return true;
            }
        }

        return false;
    }

    public static function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }
        return $maskared;
    }

    private static function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    public static function random_color()
    {
        return Utils::random_color_part() . Utils::random_color_part() . Utils::random_color_part();
    }

    public static function numeroExtenso($valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false)
    {
        // $valor = self::removerFormatacaoNumero($valor);
        $singular = null;
        $plural = null;

        if ($bolExibirMoeda) {
            $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");
        } else {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");
        }

        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezessete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");


        if ($bolPalavraFeminina) {
            if ($valor == 1) {
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
            } else {
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
            }


            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas", "quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
        }


        $z = 0;

        $valor = number_format($valor, 2, ".", ".");
        $inteiro = explode(".", $valor);

        for ($i = 0; $i < count($inteiro); $i++) {
            for ($ii = mb_strlen($inteiro[$i]); $ii < 3; $ii++) {
                $inteiro[$i] = "0" . $inteiro[$i];
            }
        }

        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $rt = null;
        $fim = count($inteiro) - ($inteiro[count($inteiro) - 1] > 0 ? 1 : 2);
        for ($i = 0; $i < count($inteiro); $i++) {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count($inteiro) - 1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ($valor == "000") {
                $z++;
            } elseif ($z > 0) {
                $z--;
            }

            if (($t == 1) && ($z > 0) && ($inteiro[0] > 0)) {
                $r .= (($z > 1) ? " de " : "") . $plural[$t];
            }

            if ($r) {
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? (($i < $fim) ? ", " : " e ") : " ") . $r;
            }
        }

        $rt = mb_substr($rt, 1);

        return ($rt ? trim($rt) : "zero");
    }

    public static function removerFormatacaoNumero($strNumero)
    {
        $strNumero = trim(str_replace("R$", null, $strNumero));

        $vetVirgula = explode(",", $strNumero);
        if (count($vetVirgula) == 1) {
            $acentos = array(".");
            $resultado = str_replace($acentos, "", $strNumero);
            return $resultado;
        } elseif (count($vetVirgula) != 2) {
            return $strNumero;
        }

        $strNumero = $vetVirgula[0];
        $strDecimal = mb_substr($vetVirgula[1], 0, 2);

        $acentos = array(".");
        $resultado = str_replace($acentos, "", $strNumero);
        $resultado = $resultado . "." . $strDecimal;

        return $resultado;
    }

    public static function mesExtenso($mes)
    {
        $meses = [
            "01" => "Janeiro",
            "02" => "Fevereiro",
            "03" => "Março",
            "04" => "Abril",
            "05" => "Maio",
            "06" => "Junho",
            "07" => "Julho",
            "08" => "Agosto",
            "09" => "Setembro",
            "10" => "Outubro",
            "11" => "Novembro",
            "12" => "Dezembro"
        ];

        return $meses[$mes];
    }

    public static function clear_string($string)
    {
        if ($string !== mb_convert_encoding(mb_convert_encoding($string, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32'))
            $string = mb_convert_encoding($string, 'UTF-8', mb_detect_encoding($string));
        $string = htmlentities($string, ENT_NOQUOTES, 'UTF-8');
        $string = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $string);
        $string = html_entity_decode($string, ENT_NOQUOTES, 'UTF-8');
        $string = preg_replace(array('`[^a-z0-9]`i', '`[-]+`'), ' ', $string);
        $string = preg_replace('/( ){2,}/', '$1', $string);
        $string = strtoupper(trim($string));
        return $string;
    }

    public static function get_months($di, $df)
    {
        $ts1 = strtotime($di);
        $ts2 = strtotime($df);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        return (($year2 - $year1) * 12) + ($month2 - $month1);
    }

    public static function get_days($di, $df)
    {
        $di = strtotime($di);
        $df = strtotime($df);
        $datediff = $df - $di;

        return round($datediff / (60 * 60 * 24));
    }

    public static function upload_image($file, $file_path = "./public_images/")
    {
        // Initiate the upload object based on the uploaded file field
        $handle = new Upload($file);

        // Generate new file name
        $file_name = str_replace(" ", "-", date("Ymdhis") . pathinfo($file['name'], PATHINFO_FILENAME));

        // Only proceed if the file has been uploaded
        if ($handle->uploaded) {
            // Give image a new name
            $handle->file_new_name_body = $file_name;
            // Upload original file
            $handle->process($file_path . "/original");
            // Make sure the large image is resized
            $handle->image_resize         = true;
            // Set the width of the large image
            $handle->image_x              = 1000;
            // Ensure the height of the large image is calculated based on ratio
            $handle->image_ratio_y        = true;
            // Give image a new name
            $handle->file_new_name_body = $file_name;
            // Upload large file
            $handle->process($file_path . "/large");

            // Make sure the medium image is resized
            $handle->image_resize         = true;
            // Set the width of the medium image
            $handle->image_x              = 500;
            // Ensure the height of the medium image is calculated based on ratio
            $handle->image_ratio_y        = true;
            // Give image a new name
            $handle->file_new_name_body = $file_name;
            // Upload medium file
            $handle->process($file_path . "/medium");

            // Make sure the thumb image is resized
            $handle->image_resize         = true;
            // Set the width of the image
            $handle->image_x              = 200;
            // Ensure the height of the thumb image is calculated based on ratio
            $handle->image_ratio_y        = true;
            // Give image a new name
            $handle->file_new_name_body = $file_name;
            // Upload thumbnail file
            $handle->process($file_path . "/thumb");

            // Proceed if image processing completed sucessfully
            if ($handle->processed) {
                // Reset the properties of the upload object
                $handle->clean();
                return $file_name . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
            } else {
                // Write the error to the screen
                throw new Exception('error : ' . $handle->error);
            }
        }
    }
}
