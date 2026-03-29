<?php

use App\Models\Contact;

if (isset($_REQUEST['TRALOI'])) {
    $contact = new Contact;
    $contact->name = $_REQUEST["name"];
    $contact->phone = $_REQUEST["phone"];
    $contact->email = $_REQUEST["email"];
    $contact->title = $_REQUEST["title"];
    $contact->content = $_REQUEST["content"];
    
    $contact->replay_id = $_REQUEST['replay_id'];
    $contact->updated_at = date('Y-m-d H:i:s');
    $contact->updated_by = $_SESSION["user_id"] ?? 1;
    $contact->save();
    set_flash('message', ['type' => 'success', 'msg' => 'Trả lời thành công']);
    header('location:index.php?opt=contact');
}
