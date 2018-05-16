<?php
class Validacao {

  public static function validarNome($val) : Int {
    $exp = "/^[a-zA-ZÀ-ú]{2,30}$/";
    return preg_match($exp,$val);
  }

  public static function validarIdade($val) : Int {
  $exp = "/^[0-9]{1,3}$/";
  return preg_match($exp,$val);
  }

  public static function validarRg($val) : Int {
  $exp = "/^[0-9]{10,14}$/";
  return preg_match($exp,$val);
  }

  public static function validarCpf($val) : Int {
  $exp = "/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/";
  return preg_match($exp,$val);
  }

  public static function validarTel($val) : Int {
  $exp = "/^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/";
  return preg_match($exp,$val);
  }

  public static function validarCnpj($val) : Int {
  $exp = "/^[0-9].{2}[0-9].{3}[0-9]{3}\/[0-9]{4}-[0-9]{2}$/";
  return preg_match($exp,$val);
  }


}//classe
