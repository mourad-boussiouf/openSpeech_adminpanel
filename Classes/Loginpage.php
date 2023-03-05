<?php 
namespace MyApp;
class LoginPage {
    private $apiUrl = "localhost/user/login"; //url de l'api pour login

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function render() {
        
        echo '
            <form method="post">
                <label for="username">Nom d&rsquo;utilisateur:</label>
                <input type="text" name="username" id="username">

                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password">

                <button type="submit" name="login">Connexion</button>
            </form>
        ';

        if (isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $curl = curl_init($this->apiUrl);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query([
                'username' => $username,
                'password' => $password
            ]));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);

            if ($response === 'success') {
                echo 'Connexion réussie';
            } else {
                echo 'Erreur, pas de connexion';
            }
        }
    }
}
?>