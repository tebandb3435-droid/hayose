<?php
// Ejemplo: enviar WhatsApp via Twilio (reemplaza datos)
function sendWhatsApp($to, $message){
  $sid = 'TWILIO_SID';
  $token = 'TWILIO_AUTH';
  $from = 'whatsapp:+1415XXXXXXX';
  $url = "https://api.twilio.com/2010-04-01/Accounts/$sid/Messages.json";
  $data = http_build_query(['To'=>'whatsapp:'.$to,'From'=>$from,'Body'=>$message]);
  $ch = curl_init($url); curl_setopt($ch, CURLOPT_POST, true); curl_setopt($ch, CURLOPT_POSTFIELDS, $data); curl_setopt($ch, CURLOPT_USERPWD, "$sid:$token"); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $resp = curl_exec($ch); curl_close($ch); return $resp;
}
?>