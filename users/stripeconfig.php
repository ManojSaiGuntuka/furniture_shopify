<?php
require_once('../vendor/autoload.php');

$stripe = array(
    "secret_key" => "sk_test_51IA3qrHLIPsjYEK5ecrm0rMfpY9BPFAJvkZbxBD87mOmgDkKYeurkeLe3TPn4CI5DMCt6kEOj0wTkuMvyQIQ9zD400CCW0YUzU",
    "publishable_key" => "pk_test_51IA3qrHLIPsjYEK5Ppvblcypo0efK0jqJgR6qHSBKMPE4IEGbXTf5W1tvgoQ85yCifjrMUKS3dlDaGhMtwx5Vx3u00fGkGohgY"
);

\Stripe\Stripe::setApiKey($stripe["secret_key"]);
?>
