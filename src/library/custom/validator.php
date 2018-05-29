<?php
/**
Validate an email address.
Provide email address (raw input)
Returns true if the email address has the email 
address format and the domain exists.
*/
function check_email_address($email) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  if (!(preg_match("^[^/@]{1,64}/@[^/@]{1,255}$", $email))) {
    // Email invalid because wrong number of characters 
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if
(!(preg_match("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
$local_array[$i]))) {
      return false;
    }
  }
  // Check if domain is IP. If not, 
  // it should be valid domain name
  if (!(preg_match("^\[?[0-9\.]+\]?$", $email_array[1]))) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!(preg_match("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
↪([A-Za-z0-9]+))$",
$domain_array[$i]))) {
        return false;
      }
    }
  }
  return true;
}


/**
Validate a postal code based on the state entered.
white paper: http://devtrench.com/posts/how-to-code-a-simple-zip-code-locator-in-php
*/
function getProvinceCode($postalCode) {
  switch( strtoupper(substr($postalCode, 0, 1))) {
    case "A": return "NL"; // Newfoundland and Labrador
    case "B": return "NS"; // Nova Scotia
    case "C": return "PE"; // Prince Edward Island
    case "E": return "NB"; // New Brunswick
    case "G":  // Eastern Quebec
    case "H":  // Metropolitan Montreal
    case "J": return "QC"; // Western Quebec
    case "K": // Eastern Ontario
    case "L": // Central Ontario
    case "M": // Metropolitan Toronto
    case "N": // Southwestern Ontario
    case "P": return "ON"; // Northern Ontario
    case "R": return "MB"; // Manitoba
    case "S": return "SK"; // Saskatchewan
    case "T": return "AB"; // Alberta
    case "V": return "BC"; // British Columbia
    case "X": return "NT,NU"; // Northwest Territories and Nunavut
    case "Y": return "YT"; // Yukon Territory

    default : return "";
  }
}

?>