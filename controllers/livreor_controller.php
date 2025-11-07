<?php

function livreor_index()
{

    // Les utilisateurs connectés peuvent poster
    $user_id = $_SESSION['user_id'] ?? null;
    $data = ['title' => "Livre d'or"];

    // Récupère les messages
    $messages = get_all_messages();
    $data['messages'] = $messages;

    // Traitement du formulaire
    if (is_post()) {
        if (!$user_id) {
            set_flash('error', 'Vous devez être connecté pour envoyer un message.');
            redirect('auth/login');
        }

        $content = trim(post('content'));
        if (empty($content)) {
            set_flash('error', 'Le message ne peut pas être vide.');
        } else {
            if (add_message($user_id, $content)) {
                set_flash('success', 'Votre message a bien été envoyé !');
                redirect('/livreor');
            } else {
                set_flash('error', 'Erreur lors de l\'ajout du message.');
            }
        }
    }

    load_view_with_layout('livreor/livreor', $data);
}
