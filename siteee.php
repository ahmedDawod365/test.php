<?php
$TOKEN="2037161262:AAHItbEWjDvKb7ysiuffUjAB3KqI9dSlYYc";//TOKEN
if (isset($TOKEN)) {
 define("TOKEN", $TOKEN);
} else {
 echo "<br> Hello There : <strong>The Variable " . '$TOKEN' . " Undefined :( </strong><br>";
 exit;
}
function bot($method, $datas = [])
{
 if (function_exists('curl_init')) {
  $url = "https://api.telegram.org/bot" . TOKEN . "/" . $method;
  $ch  = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
  $res = curl_exec($ch);
  if (curl_error($ch)) {
   var_dump(curl_error($ch));
  } else {
   return json_decode($res);
  } # END OF ISSET CURL
 } else {
  $iBadlz = http_build_query($datas);
  $url    = "https://api.telegram.org/bot" . TOKEN . "/" . $method . "?$iBadlz";
  $iBadlz = file_get_contents($url);
  return json_decode($iBadlz);
 } # END OF !CURL EXISTS
}
//==============
$update     = json_decode(file_get_contents('php://input'));
if (isset($update)) {
 $bot = bot('GetMe')->result;
 $botid = $bot->id;
 $botname = $bot->first_name;
 $botusername = $bot->username;
 $message      = $update->message;
 $data         = $update->callback_query->data;
 $edit         = $update->edited_message;
 $inline_query = $update->inline_query->query;
 if ($message) {
  $date                  = $message->date;
  $message_id            = $message->message_id;
  $text                  = $message->text;
  $chat_id               = $message->chat->id;
  $from_id               = $message->from->id;
  $language_code               = $message->from->language_code;
  $reply                 = $message->reply_to_message;
  $reply_id              = $message->reply_to_message->from->id;
  $reply_user            = $message->reply_to_message->from->username;
  $reply_message_id      = $message->reply_to_message->message_id;
  $reply_caption         = $message->reply_to_message->caption;
  $reply_audio           = $message->reply_to_message->audio;
  $reply_audio_file_id   = $message->reply_to_message->audio->file_id;
  $reply_audio_size      = $message->reply_to_message->audio->file_size;
  $forward               = $message->forward_from;
  $forward_id            = $forward->id;
  $forward_username      = $forward->username;
  $chat_forward          = $message->forward_from_chat;
  $chat_forward_id       = $chat_forward->id;
  $chat_forward_username = $chat_forward->username;
  $chat_forward_title    = $chat_forward->title;
  $chat_forward_type     = $chat_forward->type;
  $username              = $message->from->username;
  $type                  = $message->chat->type;
  $itprivate             = $type == "private";
  $itsupergroup          = $type == "supergroup";
  $itgroup               = $type == "group";
  $group_title           = $message->chat->title;
  $name                  = $message->from->first_name;
  $name_tag              = "[$name](tg://user?id=$from_id)";
  $name_reply            = $message->reply_to_message->from->first_name;
  $name_tag_reply        =  "[$name_reply](tg://user?id=$reply_id)";
  $audio                 = $message->audio;
  $audio_file_id         = $message->audio->file_id;
  $video                 = $message->video;
  $video_file_id         = $message->video->file_id;
  $voice                 = $message->voice;
  $voice_file_id         = $message->voice->file_id;
  $photo                 = $message->photo;
  $photo_file_id         = $message->photo[0]->file_id;
  $sticker               = $message->sticker;
  $sticker_file_id       = $message->sticker->file_id;
  $contact               = $message->contact;
  $contact_number        = $message->contact->phone_number;
  $contact_name          = $message->contact->first_name;
  $video_note            = $message->video_note;
  $video_note_file_id    = $message->video_note->file_id;
  $document              = $message->document;
  $document_name         = $document->file_name;
  $document_file_id      = $document->file_id;
  $gif                   = $message->animation;
  $gif_file_id           = $message->animation->file_id;
  $pin                   = $message->pinned_message;
  $pin_id                = $message->pinned_message->from->id;
  $pin_first_name        = $message->pinned_message->from->first_name;
  $pin_tag               = "[$pin_first_name](tg://user?id=$pin_id)";
  $inline                = $message->reply_markup->inline_keyboard;
  $entities              = $message->entities;
  $location              = $message->location;
  $location_file_id      = $message->location->file_id;
  $new_chat              = $message->new_chat_member;
  $left_chat             = $message->left_chat_member;
  $new_id                = $new_chat->id;
  $left_id               = $left_chat->id;
  $left_name             = $left_chat->first_name;
  } elseif ($data) {
  $date                  = $update->callback_query->date;
  $chat_id               = $update->callback_query->message->chat->id;
  $from_id               = $update->callback_query->message->reply_to_message->from->id;
  $message_id            = $update->callback_query->message->message_id;
  $from_id               = $update->callback_query->from->id;
  $name                  = $update->callback_query->from->first_name;
  $name_tag              = "[$name](tg://user?id=$from_id)";
 } elseif ($edit) {
  $from_id               = $update->edited_message->from->id;
  $chat_id               = $update->edited_message->chat->id;
  $message_id            = $update->edited_message->message_id;
  $name                  = $update->edited_message->from->first_name;
  $name_tag              = "[$name](tg://user?id=$from_id)";
 } elseif ($inline_query) {
  $inline_query_id = $update->inline_query->id;
 }
} 
$sudo="1983389011";//ايديك 
$j=json_decode(file_get_contents("F.json"),1); 
if($text!="/start" and $text and $from_id!=$sudo){
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"- تم ارسال رسالتك للمطور بسريه تامه 🤐",'reply_to_message_id'=>$message_id,'disable_web_page_preview'=>true]);
$s=bot('sendmessage',['chat_id'=>$sudo,'text'=>"- الرساله : $text",'disable_web_page_preview'=>true])->result->message_id;
$j[$s]=$from_id;
file_put_contents("F.json",json_encode($j));
} 
if($j[$reply_message_id]!=null and $from_id==$sudo){
bot('sendmessage',['chat_id'=>$j[$reply_message_id],'text'=>$text,'disable_web_page_preview'=>true]);
}
if($text=="/start"){
bot('SendMessage',['chat_id'=>$chat_id,'text'=>"
اهلا بك عزيزي في بوت السايت 👋
ارسل رسالتك وسيتم ارسالها للمطور بسريه تامه 🤐
@SR_JO
",]);
} 
//@VvVvFv - @SR_JO
